<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeanceSalle
 *
 * @ORM\Table(name="seance_salle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeanceSalleRepository")
 */
class SeanceSalle
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
     * @var integer
     *
     * @ORM\Column(name="nbr_entree_seance", type="integer" , nullable=true)
     */
    private $nbr_entree_seance;

    /**
     * @var float
     *
     * @ORM\Column(name="recette_seance", type="float" ,nullable=true)
     */
    private $recette_seance;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_seance", type="date" , nullable=true)
     */
    private $date_seance;


    /**
     * @ORM\ManyToOne(targetEntity="BordereauSalle" , inversedBy="seances")
     * @ORM\JoinColumn(name="bordereau_salle_id", referencedColumnName="id")
     */
    private $bordereau_salle;



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
     * @return int
     */
    public function getNbrEntreeSeance()
    {
        return $this->nbr_entree_seance;
    }

    /**
     * @param int $nbr_entree_seance
     */
    public function setNbrEntreeSeance($nbr_entree_seance)
    {
        $this->nbr_entree_seance = $nbr_entree_seance;
    }

    /**
     * @return float
     */
    public function getRecetteSeance()
    {
        return $this->recette_seance;
    }

    /**
     * @param float $recette_seance
     */
    public function setRecetteSeance($recette_seance)
    {
        $this->recette_seance = $recette_seance;
    }

    /**
     * @return \DateTime
     */
    public function getDateSeance()
    {
        return $this->date_seance;
    }

    /**
     * @param \DateTime $date_seance
     */
    public function setDateSeance($date_seance)
    {
        $this->date_seance = $date_seance;
    }

    /**
     * @return mixed
     */
    public function getBordereauSalle()
    {
        return $this->bordereau_salle;
    }

    /**
     * @param mixed $bordereau_salle
     */
    public function setBordereauSalle($bordereau_salle)
    {
        $this->bordereau_salle = $bordereau_salle;
    }




}

