<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Distritos
 *
 * @ORM\Table(name="DISTRITOS")
 * @ORM\Entity
 */
class Distritos
{
    /**
     * @var float
     *
     * @ORM\Column(name="F1", type="float", precision=53, scale=0, nullable=true)
     */
    private $f1;

    /**
     * @var float
     *
     * @ORM\Column(name="F2", type="float", precision=53, scale=0, nullable=true)
     */
    private $f2;

    /**
     * @var float
     *
     * @ORM\Column(name="F3", type="float", precision=53, scale=0, nullable=true)
     */
    private $f3;

    /**
     * @var string
     *
     * @ORM\Column(name="F4", type="string", length=255, nullable=true)
     */
    private $f4;


}

