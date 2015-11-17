<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Base2
 *
 * @ORM\Table(name="base2")
 * @ORM\Entity
 */
class Base2
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
     * @ORM\Column(name="proyecto", type="string", length=7, nullable=true)
     */
    private $proyecto;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="finicio", type="datetime", nullable=true)
     */
    private $finicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ffinal", type="datetime", nullable=true)
     */
    private $ffinal;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=20, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="campo1", type="string", length=20, nullable=true)
     */
    private $campo1;

    /**
     * @var string
     *
     * @ORM\Column(name="campo2", type="string", length=75, nullable=true)
     */
    private $campo2;


}

