<?php

namespace AppBundle\Entity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints\Date;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * Film
 *
 * @ORM\Table(name="film")
 * @Vich\Uploadable
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FilmRepository")
 */
class Film
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
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="entree_total", type="integer" , nullable=true)
     */
    private $entree_total;

    /**
     * @var float
     *
     * @ORM\Column(name="part_dist_salle", type="float" ,nullable=true)
     */
    private $part_dist_salle;

    /**
     * @var float
     *
     * @ORM\Column(name="part_dist_region", type="float" ,nullable=true)
     */
     private $part_dist_region;

    /**
     * @var float
     *
     * @ORM\Column(name="part_prod_salle", type="float" ,nullable=true)
     */
    private $part_prod_salle;


    /**
     * @var float
     *
     * @ORM\Column(name="depenses_total", type="float" , nullable=true)
     */
    private $depenses_total;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_sortie", type="date", nullable=true)
     */
    private $date_sortie;

    /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     *
     * @ORM\OneToMany(targetEntity="BordereauRegion", mappedBy="film")
     */
    private $borderauxRegions;

    /**
     *
     * @ORM\OneToMany(targetEntity="BordereauSalle", mappedBy="film")
     */
    private $borderauxSalles;

    /**
     *
     * @ORM\OneToMany(targetEntity="Depenses", mappedBy="film")
     */
    private $depenses;

    /**
     * @var float
     *
     * @ORM\Column(name="recette_film", type="float" ,nullable=true)
     */
    private $recette_film;



    /**
     * @return float
     */
    public function getRecetteFilm()
    {
        return $this->recette_film;
    }

    /**
     * @param float $recette_film
     */
    public function setRecetteFilm($recette_film)
    {
        $this->recette_film = $recette_film;
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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return int
     */
    public function getEntreeTotal()
    {
        return $this->entree_total;
    }

    /**
     * @param int $entree_total
     */
    public function setEntreeTotal($entree_total)
    {
        $this->entree_total = $entree_total;
    }

    /**
     * @return float
     */
    public function getPartDistSalle()
    {
        return $this->part_dist_salle;
    }

    /**
     * @param float $part_dist_salle
     */
    public function setPartDistSalle($part_dist_salle)
    {
        $this->part_dist_salle = $part_dist_salle;
    }

    /**
     * @return float
     */
    public function getPartDistRegion()
    {
        return $this->part_dist_region;
    }

    /**
     * @param float $part_dist_region
     */
    public function setPartDistRegion($part_dist_region)
    {
        $this->part_dist_region = $part_dist_region;
    }

    /**
     * @return float
     */
    public function getPartProdSalle()
    {
        return $this->part_prod_salle;
    }

    /**
     * @param float $part_prod_salle
     */
    public function setPartProdSalle($part_prod_salle)
    {
        $this->part_prod_salle = $part_prod_salle;
    }

    /**
     * @return float
     */
    public function getPartProdRegion()
    {
        return $this->part_prod_region;
    }

    /**
     * @param float $part_prod_region
     */
    public function setPartProdRegion($part_prod_region)
    {
        $this->part_prod_region = $part_prod_region;
    }

    /**
     * @return float
     */
    public function getDepensesTotal()
    {
        return $this->depenses_total;
    }

    /**
     * @param float $depenses_total
     */
    public function setDepensesTotal($depenses_total)
    {
        $this->depenses_total = $depenses_total;
    }

    /**
     * @return \DateTime
     */
    public function getDateSortie()
    {
        return $this->date_sortie;
    }

    /**
     * @param \DateTime $date_sortie
     */
    public function setDateSortie($date_sortie)
    {
        $this->date_sortie = $date_sortie;
    }



    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }



    public function setImageFile(File $image)
    {
        $this->imageFile = $image;


    }

    public function __toString()
    {
        return $this->titre;
    }

    /**
     * @return mixed
     */
    public function getDepenses()
    {
        return $this->depenses;
    }

    /**
     * @param mixed $depenses
     */
    public function setDepenses($depenses)
    {
        $this->depenses = $depenses;
    }


}

