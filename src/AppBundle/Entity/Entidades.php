<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entidades
 *
 * @ORM\Table(name="entidades", indexes={@ORM\Index(name="IDX_733055157E5D2EFF", columns={"pais"})})
 * @ORM\Entity
 */
class Entidades
{
    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="decimal", precision=4, scale=0, nullable=false)
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=60, nullable=false)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="clase", type="decimal", precision=2, scale=0, nullable=false)
     */
    private $clase;

    /**
     * @var string
     *
     * @ORM\Column(name="sigla", type="string", length=12, nullable=true)
     */
    private $sigla;

    /**
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="pais")
     * })
     */
    private $pais;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyectos", mappedBy="entidad")
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

