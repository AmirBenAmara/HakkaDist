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

}

