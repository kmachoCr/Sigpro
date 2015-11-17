<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimi
 *
 * @ORM\Table(name="movimi", indexes={@ORM\Index(name="IDX_F3A59E4252520D07", columns={"responsable"}), @ORM\Index(name="IDX_F3A59E42A94F1646", columns={"revista"}), @ORM\Index(name="IDX_F3A59E42F3E6D02F", columns={"unidad"})})
 * @ORM\Entity
 */
class Movimi
{
    /**
     * @var string
     *
     * @ORM\Column(name="global", type="string", length=10, nullable=false)
     */
    private $global;

    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=9, nullable=true)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="movimiento", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $movimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="partida", type="string", length=7, nullable=false)
     */
    private $partida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_doc", type="datetime", nullable=true)
     */
    private $fechaDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=50, nullable=true)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=50, nullable=false)
     */
    private $documento;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="errormovi", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $errormovi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechadel", type="datetime", nullable=true)
     */
    private $fechadel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaal", type="datetime", nullable=true)
     */
    private $fechaal;

    /**
     * @var string
     *
     * @ORM\Column(name="documold", type="string", length=50, nullable=true)
     */
    private $documold;

    /**
     * @var string
     *
     * @ORM\Column(name="mensual", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $mensual;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_cuenta", type="string", length=1, nullable=true)
     */
    private $tipoCuenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_transaccion", type="datetime", nullable=true)
     */
    private $fechaTransaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="mes", type="string", length=2, nullable=true)
     */
    private $mes;

    /**
     * @var string
     *
     * @ORM\Column(name="ano", type="string", length=4, nullable=true)
     */
    private $ano;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_traslado", type="decimal", precision=3, scale=0, nullable=true)
     */
    private $tipoTraslado;

    /**
     * @var string
     *
     * @ORM\Column(name="consecutivo_traslado", type="string", length=10, nullable=true)
     */
    private $consecutivoTraslado;

    /**
     * @var string
     *
     * @ORM\Column(name="carnet", type="string", length=6, nullable=true)
     */
    private $carnet;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=30, nullable=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="partida_destino", type="string", length=7, nullable=true)
     */
    private $partidaDestino;

    /**
     * @var string
     *
     * @ORM\Column(name="proyecto_destino", type="string", length=9, nullable=true)
     */
    private $proyectoDestino;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_vigencia", type="datetime", nullable=true)
     */
    private $fechaVigencia;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip2", type="string", length=50, nullable=true)
     */
    private $descrip2;

    /**
     * @var \SipUsuarios
     *
     * @ORM\ManyToOne(targetEntity="SipUsuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="responsable", referencedColumnName="identificacion")
     * })
     */
    private $responsable;

    /**
     * @var \Revistas
     *
     * @ORM\ManyToOne(targetEntity="Revistas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="revista", referencedColumnName="revista")
     * })
     */
    private $revista;

    /**
     * @var \Unidades
     *
     * @ORM\ManyToOne(targetEntity="Unidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad", referencedColumnName="unidad")
     * })
     */
    private $unidad;


}

