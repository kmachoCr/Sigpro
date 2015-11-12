<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidades
 *
 * @ORM\Table(name="unidades", indexes={@ORM\Index(name="IDX_490B4C4D7943D68", columns={"area"}), @ORM\Index(name="IDX_490B4C4F50454DF", columns={"facultad"})})
 * @ORM\Entity
 */
class Unidades
{
    /**
     * @var string
     *
     * @ORM\Column(name="unidad", type="decimal", precision=4, scale=0, nullable=false)
     */
    private $unidad;

    /**
     * @var string
     *
     * @ORM\Column(name="abrevi", type="string", length=12, nullable=false)
     */
    private $abrevi;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=90, nullable=true)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=35, nullable=true)
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_direc", type="string", length=1, nullable=false)
     */
    private $tipoDirec;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_unidad", type="string", length=1, nullable=false)
     */
    private $tipoUnidad;

    /**
     * @var string
     *
     * @ORM\Column(name="grupo", type="string", length=2, nullable=true)
     */
    private $grupo;

    /**
     * @var string
     *
     * @ORM\Column(name="clase_unidad", type="string", length=1, nullable=false)
     */
    private $claseUnidad;

    /**
     * @var string
     *
     * @ORM\Column(name="uacademica", type="string", length=8, nullable=false)
     */
    private $uacademica;

    /**
     * @var \Areas
     *
     * @ORM\ManyToOne(targetEntity="Areas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area", referencedColumnName="area")
     * })
     */
    private $area;

    /**
     * @var \Areas
     *
     * @ORM\ManyToOne(targetEntity="Areas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="facultad", referencedColumnName="area")
     * })
     */
    private $facultad;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyectos", mappedBy="unidadc")
     */
    private $proyectoc;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proyectoc = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

