<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Versionessistemas
 *
 * @ORM\Table(name="VersionesSistemas")
 * @ORM\Entity
 */
class Versionessistemas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_sistema", type="integer", nullable=false)
     */
    private $idSistema;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="majorpart", type="integer", nullable=false)
     */
    private $majorpart;

    /**
     * @var integer
     *
     * @ORM\Column(name="minorpart", type="integer", nullable=false)
     */
    private $minorpart;

    /**
     * @var integer
     *
     * @ORM\Column(name="buildpart", type="integer", nullable=false)
     */
    private $buildpart;

    /**
     * @var integer
     *
     * @ORM\Column(name="privatepart", type="integer", nullable=false)
     */
    private $privatepart;


}

