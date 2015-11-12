<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DatosPer
 *
 * @ORM\Table(name="datos_per", indexes={@ORM\Index(name="IDX_C52E4FDDD9125235", columns={"pais_nacim"}), @ORM\Index(name="IDX_C52E4FDD371C3319", columns={"pais_nacio"}), @ORM\Index(name="IDX_C52E4FDD6AAA915A", columns={"unidad_base"}), @ORM\Index(name="IDX_C52E4FDD97B7596A", columns={"unidad_adsc"})})
 * @ORM\Entity
 */
class DatosPer
{
    /**
     * @var string
     *
     * @ORM\Column(name="cedula", type="string", length=15, nullable=false)
     */
    private $cedula;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=20, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=12, nullable=false)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=12, nullable=true)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="sexo", type="string", length=1, nullable=false)
     */
    private $sexo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_nacimi", type="datetime", nullable=true)
     */
    private $fecNacimi;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=50, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono", type="string", length=30, nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="bitnet", type="string", length=50, nullable=true)
     */
    private $bitnet;

    /**
     * @var string
     *
     * @ORM\Column(name="disciplina", type="decimal", precision=5, scale=0, nullable=true)
     */
    private $disciplina;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_adscrip1", type="datetime", nullable=true)
     */
    private $fecAdscrip1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_adscrip2", type="datetime", nullable=true)
     */
    private $fecAdscrip2;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=1, nullable=false)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="categ_ra", type="string", length=2, nullable=true)
     */
    private $categRa;

    /**
     * @var string
     *
     * @ORM\Column(name="relacion_vi", type="string", length=1, nullable=true)
     */
    private $relacionVi;

    /**
     * @var string
     *
     * @ORM\Column(name="nota", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $nota;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_nota", type="datetime", nullable=true)
     */
    private $fecNota;

    /**
     * @var string
     *
     * @ORM\Column(name="grado_acad", type="string", length=5, nullable=true)
     */
    private $gradoAcad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipoinv", type="string", length=1, nullable=true)
     */
    private $tipoinv;

    /**
     * @var string
     *
     * @ORM\Column(name="grado", type="string", length=2, nullable=true)
     */
    private $grado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modificado", type="datetime", nullable=true)
     */
    private $modificado;

    /**
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_nacim", referencedColumnName="pais")
     * })
     */
    private $paisNacim;

    /**
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais_nacio", referencedColumnName="pais")
     * })
     */
    private $paisNacio;

    /**
     * @var \Unidades
     *
     * @ORM\ManyToOne(targetEntity="Unidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_base", referencedColumnName="unidad")
     * })
     */
    private $unidadBase;

    /**
     * @var \Unidades
     *
     * @ORM\ManyToOne(targetEntity="Unidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="unidad_adsc", referencedColumnName="unidad")
     * })
     */
    private $unidadAdsc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Publicaciones", mappedBy="cedula")
     */
    private $publicacion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->publicacion = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

