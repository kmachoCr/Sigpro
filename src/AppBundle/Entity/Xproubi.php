<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Xproubi
 *
 * @ORM\Table(name="xproubi")
 * @ORM\Entity
 */
class Xproubi
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=9, nullable=false)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="decimal", precision=6, scale=0, nullable=false)
     */
    private $ubicacion;


}

