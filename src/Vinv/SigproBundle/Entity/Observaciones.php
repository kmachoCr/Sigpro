<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observaciones
 *
 * @ORM\Table(name="observaciones", indexes={@ORM\Index(name="IDX_C1F3A27E6FD202B9", columns={"proyecto"}), @ORM\Index(name="IDX_C1F3A27E84291D2B", columns={"identificacion"})})
 * @ORM\Entity
 */
class Observaciones
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=1500, nullable=true)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="linea", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $linea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var \Proyectos
     *
     * @ORM\ManyToOne(targetEntity="Proyectos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="proyecto", referencedColumnName="proyecto")
     * })
     */
    private $proyecto;

    /**
     * @var \SipUsuarios
     *
     * @ORM\ManyToOne(targetEntity="SipUsuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identificacion", referencedColumnName="identificacion")
     * })
     */
    private $identificacion;


}

