<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Escala
 *
 * @ORM\Table(name="escala")
 * @ORM\Entity
 */
class Escala
{
    /**
     * @var integer
     *
     * @ORM\Column(name="categoria", type="smallint", nullable=true)
     */
    private $categoria;

    /**
     * @var integer
     *
     * @ORM\Column(name="codigo", type="smallint", nullable=true)
     */
    private $codigo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_inicio", type="datetime", nullable=true)
     */
    private $fecInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_final", type="datetime", nullable=true)
     */
    private $fecFinal;

    /**
     * @var integer
     *
     * @ORM\Column(name="monto", type="integer", nullable=true)
     */
    private $monto;


}

