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
        } else {
            $units = $service->getAll($page, 25);
        }
        //var_dump($units);
        
        $count = $service->getCount()[0]['count'] / 20;
        
        $array['count'] = ceil($count);
        $array['page'] = $page;
        $array['units'] = $units;

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
        var_dump($user);
        $service = $this->get("unit.service");
        $researchers = $service->getInv($id, 1, 20);
        $projects = $service->getProjectsByUnit($id, 1, 20);
        
        $array['projects'] = $projects;
        $array['researchers'] = $researchers;
        

        return $array;
    }

}
