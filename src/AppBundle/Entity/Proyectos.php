<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proyectos
 *
 * @ORM\Table(name="proyectos", indexes={@ORM\Index(name="IDX_A9DC1621DC158CB8", columns={"ubicacion"}), @ORM\Index(name="IDX_A9DC1621F3E6D02F", columns={"unidad"})})
 * @ORM\Entity
 */
class Proyectos
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=9, nullable=false)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=500, nullable=false)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="programa", type="string", length=5, nullable=true)
     */
    private $programa;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_invest", type="string", length=1, nullable=false)
     */
    private $tipoInvest;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_financ", type="string", length=1, nullable=false)
     */
    private $tipoFinanc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_resoluc", type="datetime", nullable=true)
     */
    private $fecResoluc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_estado", type="datetime", nullable=true)
     */
    private $fecEstado;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_vi", type="decimal", precision=8, scale=0, nullable=true)
     */
    private $montoVi;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_externo", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montoExterno;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_carga", type="decimal", precision=10, scale=0, nullable=true)
     */
    private $montoCarga;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=40, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="tiempo", type="string", length=3, nullable=true)
     */
    private $tiempo;

    /**
     * @var string
     *
     * @ORM\Column(name="ano_inicial", type="decimal", precision=4, scale=0, nullable=true)
     */
    private $anoInicial;

    /**
     * @var string
     *
     * @ORM\Column(name="meses_ano_inicial", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $mesesAnoInicial;

    /**
     * @var string
     *
     * @ORM\Column(name="eval_unidad", type="string", length=1, nullable=true)
     */
    private $evalUnidad;

    /**
     * @var string
     *
     * @ORM\Column(name="eval_vi", type="string", length=1, nullable=true)
     */
    private $evalVi;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_prop", type="string", length=1, nullable=true)
     */
    private $estadoProp;

    /**
     * @var string
     *
     * @ORM\Column(name="nota_prop", type="decimal", precision=7, scale=2, nullable=true)
     */
    private $notaProp;

    /**
     * @var string
     *
     * @ORM\Column(name="puntaje", type="decimal", precision=8, scale=2, nullable=true)
     */
    private $puntaje;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_proy", type="string", length=1, nullable=false)
     */
    private $estadoProy;

    /**
     * @var string
     *
     * @ORM\Column(name="nota_proy", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $notaProy;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_proy", type="string", length=1, nullable=false)
     */
    private $tipoProy;

    /**
     * @var string
     *
     * @ORM\Column(name="numcaja", type="string", length=10, nullable=true)
     */
    private $numcaja;

    /**
     * @var boolean
     *
     * @ORM\Column(name="bloqueado", type="boolean", nullable=true)
     */
    private $bloqueado;

    /**
     * @var string
     *
     * @ORM\Column(name="obsocio", type="string", length=2, nullable=true)
     */
    private $obsocio;

    /**
     * @var string
     *
     * @ORM\Column(name="areaaplica", type="string", length=2, nullable=true)
     */
    private $areaaplica;

    /**
     * @var \Ubicacion
     *
     * @ORM\ManyToOne(targetEntity="Ubicacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ubicacion", referencedColumnName="ubicacion")
     * })
     */
    private $ubicacion;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Preglobales", mappedBy="proyecto")
     */
    private $global;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Disciplinas", inversedBy="proyecto")
     * @ORM\JoinTable(name="xdispro",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proyecto", referencedColumnName="proyecto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="disciplina", referencedColumnName="disciplina")
     *   }
     * )
     */
    private $disciplina;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Entidades", inversedBy="proyecto")
     * @ORM\JoinTable(name="xentpro",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proyecto", referencedColumnName="proyecto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="entidad", referencedColumnName="entidad")
     *   }
     * )
     */
    private $entidad;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Descriptores", inversedBy="proyecto")
     * @ORM\JoinTable(name="xprodes",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proyecto", referencedColumnName="proyecto")
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
     * @ORM\ManyToMany(targetEntity="Unidades", inversedBy="proyectoc")
     * @ORM\JoinTable(name="xprouni",
     *   joinColumns={
     *     @ORM\JoinColumn(name="proyectoc", referencedColumnName="proyecto")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="unidadc", referencedColumnName="unidad")
     *   }
     * )
     */
    private $unidadc;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->global = new \Doctrine\Common\Collections\ArrayCollection();
        $this->disciplina = new \Doctrine\Common\Collections\ArrayCollection();
        $this->entidad = new \Doctrine\Common\Collections\ArrayCollection();
        $this->descriptor = new \Doctrine\Common\Collections\ArrayCollection();
        $this->unidadc = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

