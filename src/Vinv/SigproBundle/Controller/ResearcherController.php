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
     * @Route("/")
     * @Template()
     */
    public function indexAction() {

        $service = $this->get("user.service");
        $researchers = $service->getAll();
        //var_dump($researchers);
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
