<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlazasUnidades
 *
 * @ORM\Table(name="plazas_unidades")
 * @ORM\Entity
 */
class PlazasUnidades
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
     * @ORM\Column(name="cantidad_plazas", type="decimal", precision=18, scale=0, nullable=false)
     */
    private $cantidadPlazas;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad", type="decimal", precision=4, scale=0, nullable=false)
     */
    private $unidad;


}

