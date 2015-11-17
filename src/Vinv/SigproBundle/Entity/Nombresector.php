<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Nombresector
 *
 * @ORM\Table(name="nombresector")
 * @ORM\Entity
 */
class Nombresector
{
    /**
     * @var string
     *
     * @ORM\Column(name="sectorN", type="string", length=10, nullable=true)
     */
    private $sectorn;

    /**
     * @var string
     *
     * @ORM\Column(name="descripN", type="string", length=100, nullable=true)
     */
    private $descripn;


}

