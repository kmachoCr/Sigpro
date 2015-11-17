<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Revistas
 *
 * @ORM\Table(name="revistas", indexes={@ORM\Index(name="IDX_841864B87E5D2EFF", columns={"pais"})})
 * @ORM\Entity
 */
class Revistas
{
    /**
     * @var string
     *
     * @ORM\Column(name="revista", type="decimal", precision=5, scale=0, nullable=false)
     */
    private $revista;

    /**
     * @var string
     *
     * @ORM\Column(name="comis_edit", type="string", length=1, nullable=false)
     */
    private $comisEdit;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=50, nullable=false)
     */
    private $descrip;

    /**
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="pais")
     * })
     */
    private $pais;


}

