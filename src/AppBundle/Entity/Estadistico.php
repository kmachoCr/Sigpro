<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estadistico
 *
 * @ORM\Table(name="estadistico", indexes={@ORM\Index(name="IDX_3882A8436FD202B9", columns={"proyecto"}), @ORM\Index(name="IDX_3882A843A0F38C23", columns={"unidad_esta"})})
 * @ORM\Entity
 */
class Estadistico
{
    /**
     * @var string
     *
     * @ORM\Column(name="esta_estado", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $estaEstado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="esta_fecha", type="datetime", nullable=false)
     */
    private $estaFecha;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=9, nullable=true)
     */
    private $responsable;

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
     * @var \Unidades
     *
     * @ORM\ManyToOne(targetEntity="Unidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_esta", referencedColumnName="unidad")
     * })
     */
    private $unidadEsta;


}

