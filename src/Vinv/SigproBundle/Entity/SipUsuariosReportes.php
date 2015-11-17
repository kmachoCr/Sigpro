<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SipUsuariosReportes
 *
 * @ORM\Table(name="sip_usuarios_reportes", indexes={@ORM\Index(name="IDX_E554649784291D2B", columns={"identificacion"})})
 * @ORM\Entity
 */
class SipUsuariosReportes
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
     * @ORM\Column(name="reporte", type="string", length=10, nullable=false)
     */
    private $reporte;

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

