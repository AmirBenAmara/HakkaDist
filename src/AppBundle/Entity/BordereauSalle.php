<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BordereauSalle
 *
 * @ORM\Table(name="bordereau_salle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BordereauSalleRepository")
 */
class BordereauSalle
{




    /** @ORM\Id
     * @ORM\ManyToOne(targetEntity="Film" , inversedBy="borderauxRegions")
     *
     */
    private $film;

    /** @ORM\Id
     * @ORM\ManyToOne(targetEntity="Salle" , inversedBy="borderauxSalles")
     *
     */
    private $salle;

    /**
     * @return mixed
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * @param mixed $film
     */
    public function setFilm($film)
    {
        $this->film = $film;
    }

    /**
     * @return mixed
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * @param mixed $salle
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;
    }




}

