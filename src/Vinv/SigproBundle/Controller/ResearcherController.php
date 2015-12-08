<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;

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


        $session = new Session();
        $array = array();
        $user = $session->get('user');
        if ($user) {
            $array['user'] = $user;
        }


        $service = $this->get("user.service");
        $request = $this->get('request');
        $keyword = $request->query->get('keyword');

        if (isset($keyword) && $keyword != "") {
            $researchers = $service->getByKeyword($page, $keyword, 25);
            $count = $service->getCountByKeyword($keyword)[0]['count'] / 25;
            $total = $service->getCountByKeyword($keyword)[0]['count'];
        } else {
            $researchers = $service->getAll($page, 25);
            $count = $service->getCount()[0]['count'] / 25;
            $total = $service->getCount()[0]['count'];
        }


        $array['count'] = ceil($count);
        $array['page'] = $page;
        $array['keyword'] = $keyword;
        $array['researchers'] = $researchers;
        $array['total'] = $total;
        return $array;
    }

    /**
     * @Route("/{id}", name="researcher_show")
     * @Template()
     */
    public function showAction($id) {

        $session = new Session();
        $array = array();
        $user = $session->get('user');


        //var_dump($user);
        $service = $this->get("user.service");
        $researcher = $service->getInfo($id);
        $becas = $service->getBecasByUser($id);
        $projects = $service->getProjectsByUser($id);
        $distinciones = $service->getDistincionesByUser($id);
        $estudios = $service->getEstudiosByUser($id);
        $capacitaciones = $service->getCapacitacionesByUser($id);

        $array['user_unit'] = false;
        if ($user) {
            $array['user'] = $user;
            if ($user['type'] == "unit") {
                $serviceU = $this->get("unit.service");
                $researchers = $serviceU->getAllInv($user["user"]["unidad"]);
                for ($i = 0; $i < count($researchers) && $array['user_unit'] == false; $i++) {
                    if (trim($researchers[$i]["cedula"]) == trim($researcher["cedula"])) {
                        $array['user_unit'] = true;
                    }
                }
            }
        }


        $array['researcher'] = $researcher;
        $array['becas'] = $becas;
        $array['distinciones'] = $distinciones;
        $array['estudios'] = $estudios;
        $array['capacitaciones'] = $capacitaciones;
        $array['projects'] = $projects;

        return $array;
    }

}
