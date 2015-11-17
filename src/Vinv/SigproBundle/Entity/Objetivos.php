<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objetivos
 *
 * @ORM\Table(name="objetivos", indexes={@ORM\Index(name="IDX_B18BCDD56FD202B9", columns={"proyecto"})})
 * @ORM\Entity
 */
class Objetivos
{
    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=1500, nullable=true)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="linea", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $linea;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

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

