<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FondosExternos
 *
 * @ORM\Table(name="fondos_externos")
 * @ORM\Entity
 */
class FondosExternos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="periodo", type="integer", nullable=false)
     */
    private $periodo;

    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=9, nullable=false)
     */
    private $proyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta", type="string", length=30, nullable=false)
     */
    private $cuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion_presupuestaria", type="string", length=8, nullable=false)
     */
    private $ubicacionPresupuestaria;

    /**
     * @var string
     *
     * @ORM\Column(name="convenio", type="string", length=7, nullable=true)
     */
    private $convenio;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="decimal", precision=4, scale=0, nullable=false)
     */
    private $entidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_entidad_administradora", type="integer", nullable=false)
     */
    private $idEntidadAdministradora;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_modalidad_vinculacion", type="integer", nullable=true)
     */
    private $idModalidadVinculacion;

    /**
     * @var string
     *
     * @ORM\Column(name="ingresos", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $ingresos;

    /**
     * @var string
     *
     * @ORM\Column(name="saldo", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $saldo;

    /**
     * @var string
     *
     * @ORM\Column(name="egresos", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $egresos;

    /**
     * @var string
     *
     * @ORM\Column(name="fdi", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $fdi;

    /**
     * @var string
     *
     * @ORM\Column(name="costoadmin", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $costoadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_fdi", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $montoFdi;

    /**
     * @var string
     *
     * @ORM\Column(name="monto_costoadmin", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $montoCostoadmin;

    /**
     * @var string
     *
     * @ORM\Column(name="caja_anterior", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $cajaAnterior;

    /**
     * @var boolean
     *
     * @ORM\Column(name="autofinanciado", type="boolean", nullable=true)
     */
    private $autofinanciado = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="remanentes", type="boolean", nullable=true)
     */
    private $remanentes = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="transferencias", type="boolean", nullable=true)
     */
    private $transferencias = '0';


}

