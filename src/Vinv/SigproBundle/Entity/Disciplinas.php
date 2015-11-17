<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Disciplinas
 *
 * @ORM\Table(name="disciplinas")
 * @ORM\Entity
 */
class Disciplinas
{
    /**
     * @var string
     *
     * @ORM\Column(name="disciplina", type="decimal", precision=5, scale=0, nullable=false)
     */
    private $disciplina;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=45, nullable=false)
     */
    private $descrip;

    /**
     * @var integer
     *
     * @ORM\Column(name="contador", type="integer", nullable=true)
     */
    private $contador;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyectos", mappedBy="disciplina")
     */
    private $proyecto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyecto = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

