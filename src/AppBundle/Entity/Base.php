<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Base
 *
 * @ORM\Table(name="base")
 * @ORM\Entity
 */
class Base
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=7, nullable=true)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="usuario", type="string", length=20, nullable=true)
     */
    private $usuario;

    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=15, nullable=true)
     */
    private $cedula;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="datetime", nullable=true)
     */
    private $fecha;

    /**
     * @var string
     *
     * @ORM\Column(name="numero", type="string", length=7, nullable=true)
     */
    private $numero;


}

