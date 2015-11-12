<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Userid
 *
 * @ORM\Table(name="userID")
 * @ORM\Entity
 */
class Userid
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idUser", type="integer", nullable=false)
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=20, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=55, nullable=false)
     */
    private $pass;

    /**
     * @var string
     *
     * @ORM\Column(name="Nombre", type="string", length=50, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="Cedula", type="string", length=20, nullable=true)
     */
    private $cedula;

    /**
     * @var integer
     *
     * @ORM\Column(name="roleid", type="integer", nullable=false)
     */
    private $roleid;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=50, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="sobreNombre", type="string", length=20, nullable=true)
     */
    private $sobrenombre;


}

