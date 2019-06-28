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
     * @ORM\ManyToOne(targetEntity="Salle" , inversedBy="borderauxSalles")
     * @ORM\JoinColumn(name="salle_id", referencedColumnName="id")
     */
    private $salle;


    /**
     *
     * @ORM\OneToMany(targetEntity="SeanceSalle", mappedBy="bordereau_salle")
     */
    private $seances;

    /**
     * @var integer
     *
     * @ORM\Column(name="semaine", type="integer" ,nullable=true)
     */
    private $semaine;



    /**
     * @var integer
     *
     * @ORM\Column(name="nbEntrees", type="integer" ,nullable=true)
     */
    private $nbEntrees;

    /**
     * @return int
     */
    public function getNbEntrees()
    {
        return $this->nbEntrees;
    }

    /**
     * @param int $nbEntrees
     */
    public function setNbEntrees($nbEntrees)
    {
        $this->nbEntrees = $nbEntrees;
    }


    /**
     * @var float
     *
     * @ORM\Column(name="recette", type="float" ,nullable=true)
     */
    private $recette;

    /**
     * @var float
     *
     * @ORM\Column(name="pourcentage_salle", type="float" ,nullable=true)
     */
    private $pourcentage_salle;

    /**
     * @var float
     *
     * @ORM\Column(name="part_salle", type="float" ,nullable=true)
     */
    private $part_salle;


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

    /**
     * @return float
     */
    public function getPourcentageSalle()
    {
        return $this->pourcentage_salle;
    }

    /**
     * @param float $pourcentage_salle
     */
    public function setPourcentageSalle($pourcentage_salle)
    {
        $this->pourcentage_salle = $pourcentage_salle;
    }

    /**
     * @return float
     */
    public function getPartSalle()
    {
        return $this->part_salle;
    }

    /**
     * @param float $part_salle
     */
    public function setPartSalle($part_salle)
    {
        $this->part_salle = $part_salle;
    }




}

