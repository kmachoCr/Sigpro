<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paises
 *
 * @ORM\Table(name="paises")
 * @ORM\Entity
 */
class Paises
{
    /**
     * @var string
     *
     * @ORM\Column(name="pais", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $pais;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=25, nullable=false)
     */
    private $descrip;

    /**
     * @var integer
     *
     * @ORM\Column(name="continente", type="integer", nullable=true)
     */
    private $continente;


}

