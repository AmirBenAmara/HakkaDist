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
     * @ORM\ManyToOne(targetEntity="Semaine" , inversedBy="borderaux_salles")
     * @ORM\JoinColumn(name="semaine_id", referencedColumnName="id")
     */
    private $semaine;




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




}

