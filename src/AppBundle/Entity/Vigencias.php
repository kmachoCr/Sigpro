<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vigencias
 *
 * @ORM\Table(name="vigencias", indexes={@ORM\Index(name="IDX_4141E2ED6FD202B9", columns={"proyecto"})})
 * @ORM\Entity
 */
class Vigencias
{
    /**
     * @var string
     *
     * @ORM\Column(name="vigencia", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $vigencia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_inicio", type="datetime", nullable=false)
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
     * @ORM\Column(name="bandera", type="string", length=1, nullable=true)
     */
    private $bandera;

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

