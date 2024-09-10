<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class Salarie
{
    private $nom;
    private $prenom;
    private $email;

    private Salarie $chef;
    /**
     * @return mixed
     */
    private ArrayCollection $collaborateurs;

    /**
     * @param ArrayCollection $collaborateurs
     */
    public function __construct()
    {
        $this->collaborateurs = new ArrayCollection();
    }

    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getChef()
    {
        return $this->chef;
    }

    /**
     * @param mixed $chef
     */
    public function setChef($chef): void
    {
        $this->chef = $chef;
    }


}