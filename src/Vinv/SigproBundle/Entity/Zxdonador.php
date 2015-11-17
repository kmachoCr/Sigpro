<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zxdonador
 *
 * @ORM\Table(name="Zxdonador")
 * @ORM\Entity
 */
class Zxdonador
{
    /**
     * @var string
     *
     * @ORM\Column(name="convenio", type="string", length=7, nullable=true)
     */
    private $convenio;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="decimal", precision=4, scale=0, nullable=true)
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=14, scale=2, nullable=true)
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
     * @ORM\Column(name="cuenta1", type="string", length=20, nullable=true)
     */
    private $cuenta1;

    /**
     * @var string
     *
     * @ORM\Column(name="administra2", type="string", length=1, nullable=true)
     */
    private $administra2;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta2", type="string", length=20, nullable=true)
     */
    private $cuenta2;


}

