<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Xproconvent
 *
 * @ORM\Table(name="xproconvent", indexes={@ORM\Index(name="IX_xproconvent", columns={"proyecto"}), @ORM\Index(name="IX_xproconvent_1", columns={"proyecto"})})
 * @ORM\Entity
 */
class Xproconvent
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
     * @ORM\Column(name="convenio", type="string", length=7, nullable=false)
     */
    private $convenio;

    /**
     * @var string
     *
     * @ORM\Column(name="entidad", type="decimal", precision=4, scale=0, nullable=false)
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta", type="string", length=30, nullable=false)
     */
    private $cuenta;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_administra", type="integer", nullable=true)
     */
    private $idAdministra;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_modalidad_vinculacion", type="integer", nullable=true)
     */
    private $idModalidadVinculacion;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=true)
     */
    private $descripcion;


}

