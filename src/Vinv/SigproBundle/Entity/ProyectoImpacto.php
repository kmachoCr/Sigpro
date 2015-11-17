<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProyectoImpacto
 *
 * @ORM\Table(name="proyecto_impacto")
 * @ORM\Entity
 */
class ProyectoImpacto
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=9, nullable=false)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="impacto", type="string", length=8000, nullable=true)
     */
    private $impacto;


}

