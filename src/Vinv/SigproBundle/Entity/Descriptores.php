<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Descriptores
 *
 * @ORM\Table(name="descriptores")
 * @ORM\Entity
 */
class Descriptores
{
    /**
     * @var string
     *
     * @ORM\Column(name="descriptor", type="decimal", precision=6, scale=0, nullable=false)
     */
    private $descriptor;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=45, nullable=false)
     */
    private $descrip;

    /**
     * @var integer
     *
     * @ORM\Column(name="contador", type="smallint", nullable=true)
     */
    private $contador;

    /**
     * @var string
     *
     * @ORM\Column(name="bandera", type="string", length=1, nullable=true)
     */
    private $bandera;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Publicaciones", mappedBy="descriptor")
     */
    private $publicacion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Proyectos", mappedBy="descriptor")
     */
    private $proyecto;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->publicacion = new \Doctrine\Common\Collections\ArrayCollection();
        $this->proyecto = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

