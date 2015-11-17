<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlazasInvestigadores
 *
 * @ORM\Table(name="plazas_investigadores")
 * @ORM\Entity
 */
class PlazasInvestigadores
{
    /**
     * @var string
     *
     * @ORM\Column(name="id_xproinv", type="decimal", precision=18, scale=0, nullable=false)
     */
    private $idXproinv;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_plaza", type="datetime", nullable=true)
     */
    private $fechaInicioPlaza;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_final_plaza", type="datetime", nullable=true)
     */
    private $fechaFinalPlaza;

    /**
     * @var string
     *
     * @ORM\Column(name="horas_solicitadas", type="decimal", precision=4, scale=3, nullable=false)
     */
    private $horasSolicitadas;

    /**
     * @var string
     *
     * @ORM\Column(name="horas_aprobadas", type="decimal", precision=4, scale=3, nullable=true)
     */
    private $horasAprobadas;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=500, nullable=true)
     */
    private $observaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="documento", type="string", length=25, nullable=true)
     */
    private $documento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_solicitud", type="datetime", nullable=false)
     */
    private $fechaSolicitud;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_aprobacion", type="datetime", nullable=true)
     */
    private $fechaAprobacion;

    /**
     * @var string
     *
     * @ORM\Column(name="identificacion", type="string", length=90, nullable=false)
     */
    private $identificacion;


}

