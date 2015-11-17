<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlazasAnual
 *
 * @ORM\Table(name="plazas_anual")
 * @ORM\Entity
 */
class PlazasAnual
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


}

