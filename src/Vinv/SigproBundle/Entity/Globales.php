<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Globales
 *
 * @ORM\Table(name="globales")
 * @ORM\Entity
 */
class Globales
{
    /**
     * @var string
     *
     * @ORM\Column(name="global", type="string", length=10, nullable=false)
     */
    private $global;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=50, nullable=false)
     */
    private $descrip;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Gastos", inversedBy="global")
     * @ORM\JoinTable(name="preglobales",
     *   joinColumns={
     *     @ORM\JoinColumn(name="global", referencedColumnName="global")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="partida", referencedColumnName="gasto")
     *   }
     * )
     */
    private $partida;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->partida = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

