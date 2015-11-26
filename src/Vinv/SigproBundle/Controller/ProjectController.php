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
     * @Route("/projects/{id}", name="project_show")
     * @Template()
     */
    public function showAction($id)
    {
        $service = $this->get("project.service");
        $project = $service->getProjectById($id);
        
        $objetives = $service->getObjectivesByProject($id);
        $vigencias = $service->getVigenciasByProject($id);
        $uacad = $service->getUnidadCAByProject($id); 
        $informes = $service->getInformesByProject($id);
        $publicaciones = $service->getPublicacionesByProject($id);
        $researchers = $service->getInvestigadoresByProject($id);
        $financiamiento = $service->getFinanciamientoByProject($id);
        $presupuesto = $service->getPresupuestoByProject($id);
        $disciplinas = $service->getDisciplinasByProject($id);
        //var_dump($disciplinas);
        return array(
            'project' => $project,
            'objetives' => $objetives,
            'vigencias' => $vigencias,
            'objetives' => $objetives,
            'uacad' => $uacad,
            'informes' => $informes,
            'publicaciones' => $publicaciones,
            'researchers' => $researchers,
            'financiamiento' => $financiamiento,
            'presupuesto' => $presupuesto,
            'disciplinas' => $disciplinas
                
        );
    }
}
