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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

