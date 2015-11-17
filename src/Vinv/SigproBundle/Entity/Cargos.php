<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cargos
 *
 * @ORM\Table(name="cargos", indexes={@ORM\Index(name="IDX_3C3760F67BF39BE0", columns={"cedula"}), @ORM\Index(name="IDX_3C3760F6F3E6D02F", columns={"unidad"})})
 * @ORM\Entity
 */
class Cargos
{
    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $cargo;

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
     * @var \DatosPer
     *
     * @ORM\ManyToOne(targetEntity="DatosPer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cedula", referencedColumnName="cedula")
     * })
     */
    private $cedula;

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

