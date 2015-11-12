<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dedicacion
 *
 * @ORM\Table(name="dedicacion")
 * @ORM\Entity
 */
class Dedicacion
{
    /**
     * @var string
     *
     * @ORM\Column(name="dedicacion", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $dedicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=5, nullable=false)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="horas", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $horas;


}

