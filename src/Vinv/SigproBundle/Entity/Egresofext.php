<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Egresofext
 *
 * @ORM\Table(name="egresofext")
 * @ORM\Entity
 */
class Egresofext
{
    /**
     * @var integer
     *
     * @ORM\Column(name="consecutivo", type="integer", nullable=false)
     */
    private $consecutivo;

    /**
     * @var string
     *
     * @ORM\Column(name="egreso", type="string", length=2, nullable=false)
     */
    private $egreso;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=18, scale=0, nullable=false)
     */
    private $monto;


}

