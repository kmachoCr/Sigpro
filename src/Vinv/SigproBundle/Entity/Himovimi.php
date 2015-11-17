<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Himovimi
 *
 * @ORM\Table(name="himovimi")
 * @ORM\Entity
 */
class Himovimi
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hperiodo", type="smallint", nullable=false)
     */
    private $hperiodo;

    /**
     * @var integer
     *
     * @ORM\Column(name="hglobal", type="smallint", nullable=true)
     */
    private $hglobal;

    /**
     * @var string
     *
     * @ORM\Column(name="hproyecto", type="string", length=9, nullable=true)
     */
    private $hproyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="hmovimiento", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $hmovimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="hpartida", type="string", length=7, nullable=false)
     */
    private $hpartida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hfecha_doc", type="datetime", nullable=true)
     */
    private $hfechaDoc;

    /**
     * @var string
     *
     * @ORM\Column(name="hmonto", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $hmonto;

    /**
     * @var string
     *
     * @ORM\Column(name="hdescrip", type="string", length=50, nullable=true)
     */
    private $hdescrip;

    /**
     * @var string
     *
     * @ORM\Column(name="hdocumento", type="string", length=50, nullable=false)
     */
    private $hdocumento;

    /**
     * @var string
     *
     * @ORM\Column(name="hresponsable", type="string", length=9, nullable=true)
     */
    private $hresponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="hestado", type="string", length=1, nullable=true)
     */
    private $hestado;

    /**
     * @var string
     *
     * @ORM\Column(name="herrormovi", type="decimal", precision=4, scale=2, nullable=true)
     */
    private $herrormovi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hfechadel", type="datetime", nullable=true)
     */
    private $hfechadel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hfechaal", type="datetime", nullable=true)
     */
    private $hfechaal;

    /**
     * @var string
     *
     * @ORM\Column(name="hdocumold", type="string", length=50, nullable=true)
     */
    private $hdocumold;

    /**
     * @var string
     *
     * @ORM\Column(name="hmensual", type="decimal", precision=11, scale=2, nullable=true)
     */
    private $hmensual;

    /**
     * @var string
     *
     * @ORM\Column(name="htipo_cuenta", type="string", length=1, nullable=true)
     */
    private $htipoCuenta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hfecha_transaccion", type="datetime", nullable=true)
     */
    private $hfechaTransaccion;

    /**
     * @var string
     *
     * @ORM\Column(name="hmes", type="string", length=2, nullable=true)
     */
    private $hmes;

    /**
     * @var string
     *
     * @ORM\Column(name="hano", type="string", length=4, nullable=true)
     */
    private $hano;

    /**
     * @var string
     *
     * @ORM\Column(name="hunidad", type="decimal", precision=4, scale=0, nullable=true)
     */
    private $hunidad;

    /**
     * @var string
     *
     * @ORM\Column(name="hrevista", type="decimal", precision=5, scale=0, nullable=true)
     */
    private $hrevista;

    /**
     * @var string
     *
     * @ORM\Column(name="htipo_traslado", type="decimal", precision=3, scale=0, nullable=true)
     */
    private $htipoTraslado;

    /**
     * @var string
     *
     * @ORM\Column(name="hconsecutivo_traslado", type="string", length=10, nullable=true)
     */
    private $hconsecutivoTraslado;

    /**
     * @var string
     *
     * @ORM\Column(name="hcarnet", type="string", length=6, nullable=true)
     */
    private $hcarnet;

    /**
     * @var string
     *
     * @ORM\Column(name="hcedula", type="string", length=30, nullable=true)
     */
    private $hcedula;

    /**
     * @var string
     *
     * @ORM\Column(name="hpartida_destino", type="string", length=7, nullable=true)
     */
    private $hpartidaDestino;

    /**
     * @var string
     *
     * @ORM\Column(name="hproyecto_destino", type="string", length=9, nullable=true)
     */
    private $hproyectoDestino;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hfecha_vigencia", type="datetime", nullable=true)
     */
    private $hfechaVigencia;

    /**
     * @var string
     *
     * @ORM\Column(name="hdescrip2", type="string", length=50, nullable=true)
     */
    private $hdescrip2;


}

