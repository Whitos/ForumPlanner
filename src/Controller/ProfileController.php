<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function profile(): Response
    {
        $user = $this->getUser();

//        if (!$user->isTwoFactorEnabled()) {
//            return $this->redirectToRoute('app_2fa_setup');
//        }

        return $this->render('security/profile.html.twig');
    }
}
