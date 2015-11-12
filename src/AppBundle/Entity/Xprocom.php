<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Xprocom
 *
 * @ORM\Table(name="xprocom")
 * @ORM\Entity
 */
class Xprocom
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=7, nullable=true)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="comision", type="string", length=2, nullable=true)
     */
    private $comision;


}

