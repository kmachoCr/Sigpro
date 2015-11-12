<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectoOplau
 *
 * @ORM\Table(name="proyecto_oplau", indexes={@ORM\Index(name="IDX_A9D05A426FD202B9", columns={"proyecto"}), @ORM\Index(name="IDX_A9D05A4284291D2B", columns={"identificacion"})})
 * @ORM\Entity
 */
class ProyectoOplau
{
    /**
     * @var string
     *
     * @ORM\Column(name="cod_unid", type="string", length=8, nullable=false)
     */
    private $codUnid;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_proy", type="string", length=10, nullable=false)
     */
    private $codigoProy;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bloqueado", type="boolean", nullable=false)
     */
    private $bloqueado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reserva", type="datetime", nullable=true)
     */
    private $fechaReserva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true)
     */
    private $fechaRegistro;

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

