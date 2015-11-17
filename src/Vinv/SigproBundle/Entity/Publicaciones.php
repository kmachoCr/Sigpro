<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publicaciones
 *
 * @ORM\Table(name="publicaciones", indexes={@ORM\Index(name="IDX_A3A706C0F3E6D02F", columns={"unidad"}), @ORM\Index(name="IDX_A3A706C0A94F1646", columns={"revista"})})
 * @ORM\Entity
 */
class Publicaciones
{
    /**
     * @var string
     *
     * @ORM\Column(name="publicacion", type="string", length=5, nullable=false)
     */
    private $publicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=5, nullable=true)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $tipo;

    /**
     * @var string
     *
     * @ORM\Column(name="ambito", type="string", length=1, nullable=true)
     */
    private $ambito;

    /**
     * @var string
     *
     * @ORM\Column(name="ref_biblio", type="string", length=350, nullable=true)
     */
    private $refBiblio;

    /**
     * @var string
     *
     * @ORM\Column(name="ano", type="string", length=4, nullable=true)
     */
    private $ano;

    /**
     * @var \Unidades
     *
     * @ORM\ManyToOne(targetEntity="Unidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad", referencedColumnName="unidad")
     * })
     */
    private $unidad;

    /**
     * @var \Revistas
     *
     * @ORM\ManyToOne(targetEntity="Revistas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="revista", referencedColumnName="revista")
     * })
     */
    private $revista;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Descriptores", inversedBy="publicacion")
     * @ORM\JoinTable(name="xdespub",
     *   joinColumns={
     *     @ORM\JoinColumn(name="publicacion", referencedColumnName="publicacion")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="descriptor", referencedColumnName="descriptor")
     *   }
     * )
     */
    private $descriptor;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="DatosPer", inversedBy="publicacion")
     * @ORM\JoinTable(name="xinvpub",
     *   joinColumns={
     *     @ORM\JoinColumn(name="publicacion", referencedColumnName="publicacion")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="cedula", referencedColumnName="cedula")
     *   }
     * )
     */
    private $cedula;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->descriptor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->cedula = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

