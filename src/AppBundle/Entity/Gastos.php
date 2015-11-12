<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gastos
 *
 * @ORM\Table(name="gastos")
 * @ORM\Entity
 */
class Gastos
{
    /**
     * @var string
     *
     * @ORM\Column(name="gasto", type="string", length=7, nullable=false)
     */
    private $gasto;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=60, nullable=false)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=1, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="equivalencia", type="string", length=4, nullable=true)
     */
    private $equivalencia;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Globales", mappedBy="partida")
     */
    private $global;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->global = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

