<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observainves
 *
 * @ORM\Table(name="observainves")
 * @ORM\Entity
 */
class Observainves
{
    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=15, nullable=false)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=1500, nullable=true)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="linea", type="decimal", precision=5, scale=0, nullable=false)
     */
    private $linea;

    /**
     * @var string
     *
     * @ORM\Column(name="identificacion", type="string", length=9, nullable=true)
     */
    private $identificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;


}

