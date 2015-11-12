<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SipUsuariosLog
 *
 * @ORM\Table(name="sip_usuarios_log", indexes={@ORM\Index(name="IDX_3E06407684291D2B", columns={"identificacion"})})
 * @ORM\Entity
 */
class SipUsuariosLog
{
    /**
     * @var string
     *
     * @ORM\Column(name="sistema", type="string", length=15, nullable=false)
     */
    private $sistema = 'SIPP';

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_pantalla", type="string", length=75, nullable=false)
     */
    private $codigoPantalla;

    /**
     * @var string
     *
     * @ORM\Column(name="operacion", type="string", length=400, nullable=false)
     */
    private $operacion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=false)
     */
    private $fecha;

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

