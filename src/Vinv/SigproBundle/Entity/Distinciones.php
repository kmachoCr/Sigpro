<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Distinciones
 *
 * @ORM\Table(name="distinciones", indexes={@ORM\Index(name="IDX_35CCCF1C7BF39BE0", columns={"cedula"}), @ORM\Index(name="IDX_35CCCF1C4587B0CB", columns={"entidad"})})
 * @ORM\Entity
 */
class Distinciones
{
    /**
     * @var string
     *
     * @ORM\Column(name="distincion", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $distincion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="ambito", type="string", length=1, nullable=false)
     */
    private $ambito;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=37, nullable=false)
     */
    private $descrip;

    /**
     * @var \DatosPer
     *
     * @ORM\ManyToOne(targetEntity="DatosPer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cedula", referencedColumnName="cedula")
     * })
     */
    private $cedula;

    /**
     * @var \Entidades
     *
     * @ORM\ManyToOne(targetEntity="Entidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entidad", referencedColumnName="entidad")
     * })
     */
    private $entidad;


}

