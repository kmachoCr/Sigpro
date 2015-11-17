<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Listados
 *
 * @ORM\Table(name="listados")
 * @ORM\Entity
 */
class Listados
{
    /**
     * @var string
     *
     * @ORM\Column(name="programa", type="string", length=8, nullable=true)
     */
    private $programa;

    /**
     * @var string
     *
     * @ORM\Column(name="destino", type="string", length=50, nullable=true)
     */
    private $destino;

    /**
     * @var integer
     *
     * @ORM\Column(name="paginas", type="smallint", nullable=true)
     */
    private $paginas;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechali", type="datetime", nullable=true)
     */
    private $fechali;


}

