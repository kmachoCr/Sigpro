<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class UnitController extends Controller
{
    /**
     * @Route("/units/page/{page}", name="units")
     * @Template()
     */
    public function indexAction($page)
    {   
        $service = $this->get("unit.service");
        $request = $this->get('request');
        $keyword = $request->query->get('keyword');
        
        if(isset($keyword) && $keyword != ""){
            $units = $service->getByKeyword($page, $keyword, 25);
        }else{
            $units = $service->getAll($page, 25);
        }
        //var_dump($units);
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
        $service = $this->get("unit.service");
        $researchers = $service->getInv($id, 1, 20);
        $projects = $service->getProjectsByUnit($id, 1, 20); 

        return array(
            'projects' => $projects,
            'researchers' => $researchers
        );
    }
}
