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
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Film" , inversedBy="borderauxRegions")
     * @ORM\JoinColumn(name="film_id", referencedColumnName="id")
     */
    private $film;

    /**
     * @ORM\ManyToOne(targetEntity="Region" , inversedBy="borderauxRegions")
     * @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     *
     */
    private $region;

    /**
     *
     * @ORM\OneToMany(targetEntity="SeanceRegion", mappedBy="bordereau_region")
     */
    private $seances;

    /**
     * @ORM\ManyToOne(targetEntity="Semaine" , inversedBy="borderaux_regions")
     * @ORM\JoinColumn(name="semaine_id", referencedColumnName="id")
     */
    private $semaine;

    /**
     * @var float
     *
     * @ORM\Column(name="recette", type="float" ,nullable=true)
     */
    private $recette;

    /**
     * @return float
     */
    public function getRecette()
    {
        return $this->recette;
    }

    /**
     * @param float $recette
     */
    public function setRecette($recette)
    {
        $this->recette = $recette;
    }



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

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSeances()
    {
        return $this->seances;
    }

    /**
     * @param mixed $seances
     */
    public function setSeances($seances)
    {
        $this->seances = $seances;
    }

    /**
     * @return mixed
     */
    public function getSemaine()
    {
        return $this->semaine;
    }

    /**
     * @param mixed $semaine
     */
    public function setSemaine($semaine)
    {
        $this->semaine = $semaine;
    }


}

