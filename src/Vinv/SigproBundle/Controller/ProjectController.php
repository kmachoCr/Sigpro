<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProjectController extends Controller
{
    /**
     * @Route("/projects/page/{page}")
     * @Template()
     */
    public function indexAction($page) {

        $service = $this->get("project.service");
        $projects = $service->getAll($page, 15);
        $researchers = array();
        for($i = 0; $i < count($projects); $i++){
            array_push($researchers, $service->getInvestigadoresByProject($projects[$i]["codigo"]));
        }
        
        
        //var_dump($researchers);
        $count = $service->getCount()[0]['count'] / 15;
        return array(
            'projects' => $projects,
            'count' => $count,
            'researchers' => $researchers
                
        );
    }

    /**
     * @Route("/show/{id}", name="projects_show")
     * @Template()
     */
    public function showAction($id)
    {
        return array(
                // ...
            );    }

}
