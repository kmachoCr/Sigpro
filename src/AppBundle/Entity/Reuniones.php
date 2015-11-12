<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reuniones
 *
 * @ORM\Table(name="reuniones", indexes={@ORM\Index(name="IDX_48516BA37BF39BE0", columns={"cedula"}), @ORM\Index(name="IDX_48516BA37E5D2EFF", columns={"pais"})})
 * @ORM\Entity
 */
class Reuniones
{
    /**
     * @var string
     *
     * @ORM\Column(name="reunion", type="string", length=1, nullable=true)
     */
    private $reunion;

    /**
     * @var string
     *
     * @ORM\Column(name="ambito", type="string", length=1, nullable=true)
     */
    private $ambito;

    /**
     * @var string
     *
     * @ORM\Column(name="partic_activa", type="string", length=1, nullable=true)
     */
    private $particActiva;

    /**
     * @var string
     *
     * @ORM\Column(name="funcion", type="string", length=1, nullable=true)
     */
    private $funcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=50, nullable=true)
     */
    private $descrip;

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
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="pais")
     * })
     */
    private $pais;


}

