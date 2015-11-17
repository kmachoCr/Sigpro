<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Becas
 *
 * @ORM\Table(name="becas", indexes={@ORM\Index(name="IDX_D653DB187BF39BE0", columns={"cedula"}), @ORM\Index(name="IDX_D653DB187E5D2EFF", columns={"pais"}), @ORM\Index(name="IDX_D653DB184587B0CB", columns={"entidad"})})
 * @ORM\Entity
 */
class Becas
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_inicio", type="datetime", nullable=true)
     */
    private $fecInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fec_final", type="datetime", nullable=true)
     */
    private $fecFinal;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=35, nullable=true)
     */
    private $descrip;

    /**
     * @var \DatosPer
     *
     * @ORM\ManyToOne(targetEntity="DatosPer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cedula", referencedColumnName="cedula")
     * })
     */
    private $cedula;

    /**
     * @var \Paises
     *
     * @ORM\ManyToOne(targetEntity="Paises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pais", referencedColumnName="pais")
     * })
     */
    private $pais;

    /**
     * @var \Entidades
     *
     * @ORM\ManyToOne(targetEntity="Entidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="entidad", referencedColumnName="entidad")
     * })
     */
    private $entidad;


}

