<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UnitController extends Controller
{
    /**
     * @Route("/unit/{id}")
     * @Template()
     */
    public function unitDetailAction($id)
    {
        return null;
    }
}
