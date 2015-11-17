<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ubicacion
 *
 * @ORM\Table(name="ubicacion")
 * @ORM\Entity
 */
class Ubicacion
{
    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="decimal", precision=5, scale=0, nullable=false)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descr_ubi", type="string", length=90, nullable=false)
     */
    private $descrUbi;

    /**
     * @var string
     *
     * @ORM\Column(name="region", type="string", length=1, nullable=true)
     */
    private $region;


}

