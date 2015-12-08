<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;

class UnitController extends Controller {

    /**
     * @Route("/units/page/{page}", name="units")
     * @Template()
     */
    public function indexAction($page) {
        $session = new Session();
        $array = array();
        $user = $session->get('user');
        if ($user) {
            $array['user'] = $user;
        }

        $service = $this->get("unit.service");
        $request = $this->get('request');
        $keyword = $request->query->get('keyword');

        if (isset($keyword) && $keyword != "") {
            $units = $service->getByKeyword($page, $keyword, 25);
            $count = $service->getCountByKeyword($keyword)[0]['count'] / 25;
            $total = $service->getCountByKeyword($keyword)[0]['count'];
        } else {
            $units = $service->getAll($page, 25);
            $count = $service->getCount()[0]['count'] / 25;
            $total = $service->getCount()[0]['count'];
        }

        $array['count'] = ceil($count);
        $array['page'] = $page;
        $array['keyword'] = $keyword;
        $array['units'] = $units;
        $array['total'] = $total;


        return $array;
    }

    /**
     * @Route("/units/{id}", name="unit_show")
     * @Template()
     */
    public function showAction($id) {
        $session = new Session();
        $array = array();
        $user = $session->get('user');
        if ($user) {
            $array['user'] = $user;
        }
        $request = $this->get('request');
        $p_researchers = $request->query->get('p_researcher');
        $p_projects = $request->query->get('p_project');
        
        
        $service = $this->get("unit.service");
        
        $researchers = $service->getInv($id, $p_researchers, 20);
        $projects = $service->getProjectsByUnit($id, $p_projects, 20);

        $c_researchers = $service->getAllInv($id);
        $c_projects = $service->getAllProjectsByUnit($id);

        $unit = $service->getInfoByUnit($id);
        //  var_dump($unit);

        $array['projects'] = $projects;
        $array['p_researcher'] = $p_researchers;
        $array['p_project'] = $p_projects;
        $array['c_researcher'] = ceil(count($c_researchers)/20);
        $array['c_project'] = ceil(count($c_projects)/20);
        $array['researchers'] = $researchers;
        $array['unit'] = $unit;


        return $array;
    }

}
