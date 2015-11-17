<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SipModulos
 *
 * @ORM\Table(name="sip_modulos")
 * @ORM\Entity
 */
class SipModulos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idmodulo", type="integer", nullable=false)
     */
    private $idmodulo;

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="string", length=50, nullable=false)
     */
    private $descrip;


}

