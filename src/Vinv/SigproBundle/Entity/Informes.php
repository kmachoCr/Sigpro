<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Informes
 *
 * @ORM\Table(name="informes", indexes={@ORM\Index(name="IDX_E47FD09A6FD202B9", columns={"proyecto"})})
 * @ORM\Entity
 */
class Informes
{
    /**
     * @var string
     *
     * @ORM\Column(name="informe", type="string", length=1, nullable=false)
     */
    private $informe;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_entrega", type="datetime", nullable=false)
     */
    private $fecEntrega;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_entregado", type="datetime", nullable=true)
     */
    private $fecEntregado;

    /**
     * @var string
     *
     * @ORM\Column(name="cartas", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $cartas;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $nota;

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

