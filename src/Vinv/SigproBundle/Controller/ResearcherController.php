<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/researchers")
 * @Template()
 */
class ResearcherController extends Controller {

    /**
     * @Route("/page/{page}", name="researchers")
     * @Template()
     */
    public function indexAction($page) {
        $service = $this->get("user.service");
        $request = $this->get('request');
        $keyword = $request->query->get('keyword');
        
        if(isset($keyword) && $keyword != ""){
            $researchers = $service->getByKeyword($page, $keyword, 25);
        }else{
            $researchers = $service->getAll($page, 25);
        }
        
        return array(
            'researchers' => $researchers
        );
    }

    /**
     * @Route("/{id}", name="researcher_show")
     * @Template()
     */
    public function showAction($id) {

        $service = $this->get("user.service");
        $researcher = $service->getInfo($id);
        $becas = $service->getBecasByUser($id);
        $projects = $service->getProjectsByUser($id);
        $distinciones = $service->getDistincionesByUser($id);
        $estudios = $service->getEstudiosByUser($id);
        $capacitaciones = $service->getCapacitacionesByUser($id);
    
        return array(
            'researcher' => $researcher,
            'becas' => $becas,
            'distinciones' => $distinciones,
            'estudios' => $estudios,
            'capacitaciones' => $capacitaciones,
            'projects'=> $projects
        );
    }

}
