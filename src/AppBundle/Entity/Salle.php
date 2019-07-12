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
     * @var float
     *
     * @ORM\Column(name="recette_salle", type="float" , nullable=true)
     */
    private $recette_salle;




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


    /**
     * @return float
     */
    public function getRecetteSalle()
    {
        return $this->recette_salle;
    }/**
     * @param float $recette_salle
     */
    public function setRecetteSalle($recette_salle)
    {
        $this->recette_salle = $recette_salle;
    }





    function __toString()
    {
       return $this->nom;
    }

}

