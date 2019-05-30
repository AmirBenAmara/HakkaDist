<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SeanceRegion
 *
 * @ORM\Table(name="seance_region")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeanceRegionRepository")
 */
class SeanceRegion
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

