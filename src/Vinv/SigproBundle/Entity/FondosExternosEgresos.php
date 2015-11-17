<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FondosExternosEgresos
 *
 * @ORM\Table(name="fondos_externos_egresos")
 * @ORM\Entity
 */
class FondosExternosEgresos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="periodo", type="integer", nullable=false)
     */
    private $periodo;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta", type="string", length=30, nullable=false)
     */
    private $cuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="partida", type="string", length=7, nullable=false)
     */
    private $partida;

    /**
     * @var string
     *
     * @ORM\Column(name="egreso", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $egreso;


}

