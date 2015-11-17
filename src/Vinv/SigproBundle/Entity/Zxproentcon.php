<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zxproentcon
 *
 * @ORM\Table(name="Zxproentcon")
 * @ORM\Entity
 */
class Zxproentcon
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=9, nullable=true)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="convenio", type="string", length=7, nullable=true)
     */
    private $convenio;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="decimal", precision=18, scale=0, nullable=false)
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=18, scale=0, nullable=true)
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=50, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="administra1", type="string", length=1, nullable=true)
     */
    private $administra1;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta1", type="string", length=50, nullable=true)
     */
    private $cuenta1;

    /**
     * @var string
     *
     * @ORM\Column(name="administra2", type="string", length=1, nullable=false)
     */
    private $administra2;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta2", type="string", length=50, nullable=true)
     */
    private $cuenta2;


}

