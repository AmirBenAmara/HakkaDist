<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salle
 *
 * @ORM\Table(name="salle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SalleRepository")
 */
class Salle
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     *
     * @ORM\OneToMany(targetEntity="BordereauSalle", mappedBy="salle")
     */
    private $borderauxSalles;


    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $nom;

     /**
      * @var string
      *
      * @ORM\Column(name="nomsociete", type="string", length=255, nullable=false)
      */
    private $nomsociete;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;

     /**
      * @var string
      *
      * @ORM\Column(name="mat_fiscale", type="string", length=255, nullable=false)
      */
    private $mat_fiscale;

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getMatFiscale()
    {
        return $this->mat_fiscale;
    }

    /**
     * @param string $mat_fiscale
     */
    public function setMatFiscale($mat_fiscale)
    {
        $this->mat_fiscale = $mat_fiscale;
    }

    /**
     * @return string
     */
    public function getPartDistSalle()
    {
        return $this->part_dist_salle;
    }

    /**
     * @param string $part_dist_salle
     */
    public function setPartDistSalle($part_dist_salle)
    {
        $this->part_dist_salle = $part_dist_salle;
    }

    /**
     * @return string
     */
    public function getPartProprioSalle()
    {
        return $this->part_proprio_salle;
    }

    /**
     * @param string $part_proprio_salle
     */
    public function setPartProprioSalle($part_proprio_salle)
    {
        $this->part_proprio_salle = $part_proprio_salle;
    }


     /**
      * @var string
      *
      * @ORM\Column(name="part_dist_salle", type="float")
      */
    private $part_dist_salle;

    /**
     * @var string
     *
     * @ORM\Column(name="part_proprio_salle", type="float")
     */
    private $part_proprio_salle;





    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBorderauxSalles()
    {
        return $this->borderauxSalles;
    }

    /**
     * @param mixed $borderauxSalles
     */
    public function setBorderauxSalles($borderauxSalles)
    {
        $this->borderauxSalles = $borderauxSalles;
    }

    /**
     * @return string
     */
    public function getNomsociete()
    {
        return $this->nomsociete;
    }

    /**
     * @param string $nomsociete
     */
    public function setNomsociete($nomsociete)
    {
        $this->nomsociete = $nomsociete;
    }



    function __toString()
    {
       return $this->nom;
    }

}

