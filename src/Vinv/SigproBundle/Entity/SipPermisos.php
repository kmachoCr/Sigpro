<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SipPermisos
 *
 * @ORM\Table(name="sip_permisos", indexes={@ORM\Index(name="IDX_315CE263884C629A", columns={"idmodulo"}), @ORM\Index(name="IDX_315CE26384291D2B", columns={"identificacion"}), @ORM\Index(name="IDX_315CE26317506450", columns={"idrol"})})
 * @ORM\Entity
 */
class SipPermisos
{
    /**
     * @var \SipModulos
     *
     * @ORM\ManyToOne(targetEntity="SipModulos")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idmodulo", referencedColumnName="idmodulo")
     * })
     */
    private $idmodulo;

    /**
     * @var \SipUsuarios
     *
     * @ORM\ManyToOne(targetEntity="SipUsuarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="identificacion", referencedColumnName="identificacion")
     * })
     */
    private $identificacion;

    /**
     * @var \SipRoles
     *
     * @ORM\ManyToOne(targetEntity="SipRoles")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idrol", referencedColumnName="idrol")
     * })
     */
    private $idrol;


}

