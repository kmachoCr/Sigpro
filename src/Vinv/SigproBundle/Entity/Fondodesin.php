<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fondodesin
 *
 * @ORM\Table(name="fondodesin")
 * @ORM\Entity
 */
class Fondodesin
{
    /**
     * @var string
     *
     * @ORM\Column(name="proyecto", type="string", length=9, nullable=false)
     */
    private $proyecto;

    /**
     * @var integer
     *
     * @ORM\Column(name="numero", type="integer", nullable=false)
     */
    private $numero;

    /**
     * @var string
     *
     * @ORM\Column(name="novi", type="string", length=25, nullable=true)
     */
    private $novi;

    /**
     * @var string
     *
     * @ORM\Column(name="nounidad", type="string", length=25, nullable=true)
     */
    private $nounidad;

    /**
     * @var string
     *
     * @ORM\Column(name="norectoria", type="string", length=25, nullable=true)
     */
    private $norectoria;

    /**
     * @var string
     *
     * @ORM\Column(name="monto", type="decimal", precision=20, scale=2, nullable=true)
     */
    private $monto;

    /**
     * @var string
     *
     * @ORM\Column(name="porcen", type="decimal", precision=18, scale=2, nullable=true)
     */
    private $porcen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="veinicio", type="datetime", nullable=true)
     */
    private $veinicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="vefinal", type="datetime", nullable=true)
     */
    private $vefinal;

    /**
     * @var string
     *
     * @ORM\Column(name="cuenta", type="string", length=15, nullable=true)
     */
    private $cuenta;

    /**
     * @var string
     *
     * @ORM\Column(name="justificacion", type="string", length=200, nullable=true)
     */
    private $justificacion;


}

