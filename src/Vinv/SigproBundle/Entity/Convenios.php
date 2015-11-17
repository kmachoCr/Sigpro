<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Convenios
 *
 * @ORM\Table(name="convenios", indexes={@ORM\Index(name="IDX_6A9A1DF06FD202B9", columns={"proyecto"})})
 * @ORM\Entity
 */
class Convenios
{
    /**
     * @var string
     *
     * @ORM\Column(name="convenio", type="string", length=7, nullable=false)
     */
    private $convenio;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, nullable=true)
     */
    private $nombre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_inicio", type="datetime", nullable=true)
     */
    private $fecInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_final", type="datetime", nullable=true)
     */
    private $fecFinal;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="nomproyecto", type="string", length=300, nullable=true)
     */
    private $nomproyecto;

    /**
     * @var \Proyectos
     *
     * @ORM\ManyToOne(targetEntity="Proyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proyecto", referencedColumnName="proyecto")
     * })
     */
    private $proyecto;


}

