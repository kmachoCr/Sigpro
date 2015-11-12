<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CcMiembros
 *
 * @ORM\Table(name="cc_miembros")
 * @ORM\Entity
 */
class CcMiembros
{
    /**
     * @var string
     *
     * @ORM\Column(name="identificacion", type="string", length=15, nullable=false)
     */
    private $identificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=12, nullable=false)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=12, nullable=true)
     */
    private $apellido2;


}

