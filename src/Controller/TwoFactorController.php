<?php

namespace App\Controller;

use AllowDynamicProperties;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Scheb\TwoFactorBundle\Security\TwoFactor\Provider\Google\GoogleAuthenticatorInterface;

#[AllowDynamicProperties] class TwoFactorController extends AbstractController
{

    #[Route('/two-factor/setup', name: '2fa_setup')]
    public function setup(Request $request, GoogleAuthenticatorInterface $googleAuthenticator, EntityManagerInterface $entityManager): Response
    {
        // Get the currently logged-in user
        $user = $this->getUser();

        // Generate the secret and QR code for the user
        if (!$user->getGoogleAuthenticatorSecret()) {
            $secret = $googleAuthenticator->generateSecret();
            $user->setGoogleAuthenticatorSecret($secret);
            // Save user to persist the secret in the database
            $entityManager->flush();
        }

        // Generate QR code URL
        $qrCodeUrl = $this->googleAuthenticator->getQRContent($user);
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data('Custom QR code contents')
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(ErrorCorrectionLevel::High)
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(RoundBlockSizeMode::Margin)
            ->logoPath(__DIR__.'/assets/symfony.png')
            ->logoResizeToWidth(50)
            ->logoPunchoutBackground(true)
            ->labelText('This is the label')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(LabelAlignment::Center)
            ->validateResult(false)
            ->build();

        $qrCodeUrl = $result->getDataUri();

        return $this->render('two_factor/setup.html.twig', [
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    }
}
