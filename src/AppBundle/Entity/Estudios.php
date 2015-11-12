<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudios
 *
 * @ORM\Table(name="estudios", indexes={@ORM\Index(name="IDX_59035C7D7BF39BE0", columns={"cedula"}), @ORM\Index(name="IDX_59035C7DAFFCA533", columns={"universidad"}), @ORM\Index(name="IDX_59035C7D72D32A26", columns={"disciplina"})})
 * @ORM\Entity
 */
class Estudios
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
     * @ORM\Column(name="titulo", type="string", length=1, nullable=true)
     */
    private $titulo;

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
     * @var \Entidades
     *
     * @ORM\ManyToOne(targetEntity="Entidades")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="universidad", referencedColumnName="entidad")
     * })
     */
    private $universidad;

    /**
     * @var \Disciplinas
     *
     * @ORM\ManyToOne(targetEntity="Disciplinas")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disciplina", referencedColumnName="disciplina")
     * })
     */
    private $disciplina;


}

