<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Codigos
 *
 * @ORM\Table(name="codigos")
 * @ORM\Entity
 */
class Codigos
{
    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=75, nullable=false)
     */
    private $descrip;


}

