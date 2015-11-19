<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UnitController extends Controller
{
    /**
     * @Route("/units", name="units")
     * @Template()
     */
    public function indexAction()
    {   
        $service = $this->get("unit.service");
        $units = $service->getAll(); 
        return array(
            'units' => $units
        );
    }
    
     /**
     * @Route("/units/{id}", name="unit_show")
     * @Template()
     */
    public function showAction($id)
    {
        return null;
    }
}
