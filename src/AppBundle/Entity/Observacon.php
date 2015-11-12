<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Observacon
 *
 * @ORM\Table(name="observacon")
 * @ORM\Entity
 */
class Observacon
{
    /**
     * @var string
     *
     * @ORM\Column(name="convenio", type="string", length=7, nullable=false)
     */
    private $convenio;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=300, nullable=true)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="linea", type="decimal", precision=3, scale=0, nullable=true)
     */
    private $linea;


}

