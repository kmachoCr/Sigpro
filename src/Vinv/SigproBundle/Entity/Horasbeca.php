<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Horasbeca
 *
 * @ORM\Table(name="horasbeca", indexes={@ORM\Index(name="IDX_A5025D0EE6B8CF5A", columns={"llave"})})
 * @ORM\Entity
 */
class Horasbeca
{
    /**
     * @var string
     *
     * @ORM\Column(name="montopc", type="decimal", precision=14, scale=2, nullable=false)
     */
    private $montopc;

    /**
     * @var string
     *
     * @ORM\Column(name="montosc", type="decimal", precision=14, scale=2, nullable=false)
     */
    private $montosc;

    /**
     * @var \Gastos
     *
     * @ORM\ManyToOne(targetEntity="Gastos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="llave", referencedColumnName="gasto")
     * })
     */
    private $llave;


}

