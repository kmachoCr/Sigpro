<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bitacora
 *
 * @ORM\Table(name="bitacora")
 * @ORM\Entity
 */
class Bitacora
{
    /**
     * @var string
     *
     * @ORM\Column(name="programa", type="string", length=20, nullable=true)
     */
    private $programa;

    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=7, nullable=true)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=15, nullable=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="identificacion", type="string", length=5, nullable=true)
     */
    private $identificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="tipomov", type="string", length=2, nullable=true)
     */
    private $tipomov;

    /**
     * @var string
     *
     * @ORM\Column(name="descripmov", type="string", length=20, nullable=true)
     */
    private $descripmov;

    /**
     * @var string
     *
     * @ORM\Column(name="informacionold", type="string", length=500, nullable=true)
     */
    private $informacionold;

    /**
     * @var string
     *
     * @ORM\Column(name="informacionnew", type="string", length=500, nullable=true)
     */
    private $informacionnew;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="borra", type="string", length=2, nullable=true)
     */
    private $borra;


}

