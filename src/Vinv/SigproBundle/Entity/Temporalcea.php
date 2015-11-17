<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temporalcea
 *
 * @ORM\Table(name="TemporalCEA")
 * @ORM\Entity
 */
class Temporalcea
{
    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=15, nullable=true)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=60, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tituloCEA", type="string", length=30, nullable=true)
     */
    private $titulocea;

    /**
     * @var string
     *
     * @ORM\Column(name="tituloVI", type="string", length=10, nullable=true)
     */
    private $titulovi;

    /**
     * @var string
     *
     * @ORM\Column(name="actualizaVI", type="string", length=1, nullable=true)
     */
    private $actualizavi;

    /**
     * @var string
     *
     * @ORM\Column(name="campo3", type="string", length=1, nullable=true)
     */
    private $campo3;


}

