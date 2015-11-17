<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tablaobserva
 *
 * @ORM\Table(name="TABLAOBSERVA")
 * @ORM\Entity
 */
class Tablaobserva
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=50, nullable=true)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=1500, nullable=true)
     */
    private $descrip;

    /**
     * @var integer
     *
     * @ORM\Column(name="linea", type="integer", nullable=true)
     */
    private $linea;

    /**
     * @var integer
     *
     * @ORM\Column(name="identificacion", type="integer", nullable=true)
     */
    private $identificacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;


}

