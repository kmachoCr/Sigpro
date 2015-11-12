<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SipRoles
 *
 * @ORM\Table(name="sip_roles")
 * @ORM\Entity
 */
class SipRoles
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idrol", type="integer", nullable=false)
     */
    private $idrol;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=15, nullable=false)
     */
    private $descrip;


}

