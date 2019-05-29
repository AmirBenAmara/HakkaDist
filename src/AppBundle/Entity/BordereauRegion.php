<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BordereauRegion
 *
 * @ORM\Table(name="bordereau_region")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BordereauRegionRepository")
 */
class BordereauRegion
{


    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Film" , inversedBy="borderauxRegions")
     *
     */
    private $film;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Region" , inversedBy="borderauxRegions")
     *
     */
    private $region;

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
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param mixed $region
     */
    public function setRegion($region)
    {
        $this->region = $region;
    }


}

