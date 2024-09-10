<?php

namespace App\Controller;

use App\Entity\Salarie;

class TestController
{
    public function Test()
    {
        $salarie = new Salarie();
        $salarie->setNom('Doe');
        $salarie->setPrenom('John');
        $salarie->setEmail('john@gmail.com');

        $salarie2 = new Salarie();
        $salarie2->setNom('Doe');
        $salarie2->setPrenom('Jane');
        $salarie2->setEmail('Jane');

        $salarie->SetChef($salarie2);
    }

}