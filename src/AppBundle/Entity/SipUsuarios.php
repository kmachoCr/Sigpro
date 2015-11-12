<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\GeneratedValue;
/**
 * SipUsuarios
 *
 * @ORM\Table(name="sip_usuarios")
 * @ORM\Entity
 */
class SipUsuarios
{
    /**
     * @var string
     *
     * @GeneratedValue(strategy="SEQUENCE")
     * @ORM\Column(name="identificacion", type="string", length=9, nullable=false)
     */
    private $identificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=25, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido1", type="string", length=25, nullable=true)
     */
    private $apellido1;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido2", type="string", length=25, nullable=true)
     */
    private $apellido2;

    /**
     * @var string
     *
     * @ORM\Column(name="nombreusuario", type="string", length=25, nullable=true)
     */
    private $nombreusuario;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", length=32, nullable=true)
     */
    private $contrasena;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_registro", type="datetime", nullable=true)
     */
    private $fechaRegistro;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=250, nullable=true)
     */
    private $observaciones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="habilitado", type="boolean", nullable=true)
     */
    private $habilitado;


}

