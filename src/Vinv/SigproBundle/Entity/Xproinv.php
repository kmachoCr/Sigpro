<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Xproinv
 *
 * @ORM\Table(name="xproinv", indexes={@ORM\Index(name="IDX_AC807A866B351F9C", columns={"dedicacion"}), @ORM\Index(name="IDX_AC807A866FD202B9", columns={"proyecto"}), @ORM\Index(name="IDX_AC807A867BF39BE0", columns={"cedula"})})
 * @ORM\Entity
 */
class Xproinv
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_xproinv", type="decimal", precision=18, scale=0, nullable=false)
     */
    private $idXproinv;

    /**
     * @var string
     *
     * @ORM\Column(name="participacion", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $participacion;

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
     * @ORM\Column(name="monto_ca", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montoCa;

    /**
     * @var string
     *
     * @ORM\Column(name="bandera", type="string", length=1, nullable=true)
     */
    private $bandera;

    /**
     * @var string
     *
     * @ORM\Column(name="regunique", type="string", length=1, nullable=true)
     */
    private $regunique;

    /**
     * @var \Dedicacion
     *
     * @ORM\ManyToOne(targetEntity="Dedicacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="dedicacion", referencedColumnName="dedicacion")
     * })
     */
    private $dedicacion;

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
     * @var \DatosPer
     *
     * @ORM\ManyToOne(targetEntity="DatosPer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cedula", referencedColumnName="cedula")
     * })
     */
    private $cedula;


}

