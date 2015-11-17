<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vola
 *
 * @ORM\Table(name="VolA")
 * @ORM\Entity
 */
class Vola
{
    /**
     * @var string
     *
     * @ORM\Column(name="F1", type="string", length=20, nullable=true)
     */
    private $f1;

    /**
     * @var string
     *
     * @ORM\Column(name="F2", type="string", length=100, nullable=true)
     */
    private $f2;


}

