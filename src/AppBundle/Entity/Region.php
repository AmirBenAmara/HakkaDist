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
    public function getPartDistRegion()
    {
        return $this->part_dist_region;
    }

    /**
     * @param string $part_dist_region
     */
    public function setPartDistRegion($part_dist_region)
    {
        $this->part_dist_region = $part_dist_region;
    }

    /**
     * @return string
     */
    public function getPartProprioRegion()
    {
        return $this->part_proprio_region;
    }

    /**
     * @param string $part_proprio_region
     */
    public function setPartProprioRegion($part_proprio_region)
    {
        $this->part_proprio_region = $part_proprio_region;
    }


     /**
      * @var string
      *
      * @ORM\Column(name="part_dist_region", type="float")
      */
    private $part_dist_region;

    /**
     * @var string
     *
     * @ORM\Column(name="part_proprio_region", type="float")
     */
    private $part_proprio_region;



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

