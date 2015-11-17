<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hipresup
 *
 * @ORM\Table(name="hipresup")
 * @ORM\Entity
 */
class Hipresup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="hperiodo", type="smallint", nullable=false)
     */
    private $hperiodo;

    /**
     * @var integer
     *
     * @ORM\Column(name="hglobal", type="integer", nullable=false)
     */
    private $hglobal;

    /**
     * @var string
     *
     * @ORM\Column(name="hproyecto", type="string", length=9, nullable=false)
     */
    private $hproyecto;

    /**
     * @var string
     *
     * @ORM\Column(name="hpartida", type="string", length=7, nullable=false)
     */
    private $hpartida;

    /**
     * @var string
     *
     * @ORM\Column(name="hasignado", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $hasignado;

    /**
     * @var string
     *
     * @ORM\Column(name="hampliado", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $hampliado;

    /**
     * @var string
     *
     * @ORM\Column(name="hdisminuido", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $hdisminuido;

    /**
     * @var string
     *
     * @ORM\Column(name="hcomprometido", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $hcomprometido;

    /**
     * @var string
     *
     * @ORM\Column(name="hreservabeca", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $hreservabeca;

    /**
     * @var string
     *
     * @ORM\Column(name="hgirado", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $hgirado;


}

