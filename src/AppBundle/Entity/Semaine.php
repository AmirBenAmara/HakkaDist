<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semaine
 *
 * @ORM\Table(name="semaine")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SemaineRepository")
 */
class Semaine
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date", nullable=true)
     */
    private $date_debut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date", nullable=true)
     */
    private $date_fin;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_entree_semaine", type="integer" , nullable=true)
     */
    private $nbr_entree_semaine;

    /**
     *
     * @ORM\OneToMany(targetEntity="BordereauRegion", mappedBy="semaine")
     */
    private $borderaux_regions;

    /**
     *
     * @ORM\OneToMany(targetEntity="BordereauSalle", mappedBy="semaine")
     */
    private $bordereaux_salles;


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
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * @param \DateTime $date_debut
     */
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $date_debut;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * @param \DateTime $date_fin
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;
    }

    /**
     * @return int
     */
    public function getNbrEntreeSemaine()
    {
        return $this->nbr_entree_semaine;
    }

    /**
     * @param int $nbr_entree_semaine
     */
    public function setNbrEntreeSemaine($nbr_entree_semaine)
    {
        $this->nbr_entree_semaine = $nbr_entree_semaine;
    }

    /**
     * @return mixed
     */
    public function getBorderauxRegions()
    {
        return $this->borderaux_regions;
    }

    /**
     * @param mixed $borderaux_regions
     */
    public function setBorderauxRegions($borderaux_regions)
    {
        $this->borderaux_regions = $borderaux_regions;
    }

    /**
     * @return mixed
     */
    public function getBordereauxSalles()
    {
        return $this->bordereaux_salles;
    }

    /**
     * @param mixed $bordereaux_salles
     */
    public function setBordereauxSalles($bordereaux_salles)
    {
        $this->bordereaux_salles = $bordereaux_salles;
    }



}

