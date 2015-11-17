<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Precios
 *
 * @ORM\Table(name="precios")
 * @ORM\Entity
 */
class Precios
{
    /**
     * @var string
     *
     * @ORM\Column(name="anop", type="decimal", precision=4, scale=0, nullable=false)
     */
    private $anop;

    /**
     * @var string
     *
     * @ORM\Column(name="indice", type="decimal", precision=8, scale=1, nullable=false)
     */
    private $indice;


}

