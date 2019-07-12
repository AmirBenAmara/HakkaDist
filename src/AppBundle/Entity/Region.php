<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RegionRepository")
 */
class Region
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
     * @ORM\OneToMany(targetEntity="BordereauRegion", mappedBy="region")
     */
    private $borderauxRegions;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="mat_fiscale", type="string", length=255, nullable=true)
     */
    private $mat_fiscale;

    /**
     * @var string
     *
     * @ORM\Column(name="gouvernerat", type="string", length=255, nullable=true)
     */
    private $gouvernerat;

    /**
     * @var float
     *
     * @ORM\Column(name="recette_region", type="float" ,nullable=true)
     */
    private $recette_region;

    /**
     * @return float
     */
    public function getRecetteRegion()
    {
        return $this->recette_region;
    }

    /**
     * @param float $recette_region
     */
    public function setRecetteRegion($recette_region)
    {
        $this->recette_region = $recette_region;
    }



    /**
     * @return string
     */
    public function getGouvernerat()
    {
        return $this->gouvernerat;
    }

    /**
     * @param string $gouvernerat
     */
    public function setGouvernerat($gouvernerat)
    {
        $this->gouvernerat = $gouvernerat;
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
    public function getBorderauxRegions()
    {
        return $this->borderauxRegions;
    }

    /**
     * @param mixed $borderauxRegions
     */
    public function setBorderauxRegions($borderauxRegions)
    {
        $this->borderauxRegions = $borderauxRegions;
    }

    function __toString()
    {
        return $this->nom;
    }




}

