<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Padortem
 *
 * @ORM\Table(name="PadorTem")
 * @ORM\Entity
 */
class Padortem
{
    /**
     * @var string
     *
     * @ORM\Column(name="sectorF1", type="string", length=10, nullable=true)
     */
    private $sectorf1;

    /**
     * @var string
     *
     * @ORM\Column(name="descriptorF2", type="string", length=100, nullable=true)
     */
    private $descriptorf2;


}

