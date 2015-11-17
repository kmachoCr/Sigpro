<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Areas
 *
 * @ORM\Table(name="areas")
 * @ORM\Entity
 */
class Areas
{
    /**
     * @var string
     *
     * @ORM\Column(name="area", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $area;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=30, nullable=false)
     */
    private $descrip;


}

