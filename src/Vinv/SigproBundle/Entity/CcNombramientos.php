<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CcNombramientos
 *
 * @ORM\Table(name="cc_nombramientos", indexes={@ORM\Index(name="IDX_CB5BDF9A84291D2B", columns={"identificacion"}), @ORM\Index(name="IDX_CB5BDF9AF3E6D02F", columns={"unidad"})})
 * @ORM\Entity
 */
class CcNombramientos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="idpuesto", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $idpuesto;

    /**
     * @var integer
     *
     * @ORM\Column(name="covi", type="integer", nullable=false)
     */
    private $covi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime", nullable=false)
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_final", type="datetime", nullable=false)
     */
    private $fechaFinal;

    /**
     * @var \CcMiembros
     *
     * @ORM\ManyToOne(targetEntity="CcMiembros")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identificacion", referencedColumnName="identificacion")
     * })
     */
    private $identificacion;

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

