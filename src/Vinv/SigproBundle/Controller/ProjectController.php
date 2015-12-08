<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;

class ProjectController extends Controller {

    /**
     * @Route("/projects/page/{page}", name="projects")
     * @Template()
     */
    public function indexAction($page) {
        $service = $this->get("project.service");
        $request = $this->get('request');
        $keyword = $request->query->get('keyword');

        $session = new Session();
        $array = array();
        $user = $session->get('user');
        if ($user) {
            $array['user'] = $user;
        }

        if (isset($keyword) && $keyword != "") {
            $projects = $service->getByKeyword($page, $keyword, 15);
            $count = $service->getCountbyKeyword($keyword)[0]['count'] / 15;
            $total = $service->getCountByKeyword($keyword)[0]['count'];
        } else {
            $projects = $service->getAll($page, 15);
            $count = $service->getCount()[0]['count'] / 15;
            $total = $service->getCount()[0]['count'];
        }

        $researchers = array();
        $researchers_new = array();
        $ids = array();
        for ($i = 0; $i < count($projects); $i++) {
            array_push($researchers, $service->getInvestigadoresByProject($projects[$i]["codigo"]));
        }

        for ($i = 0; $i < count($researchers); $i++) {
            for ($t = 0; $t < count($researchers[$i]); $t++) {
                if (!in_array($researchers[$i][$t]["cedula"], $ids)) {
                    array_push($ids, $researchers[$i][$t]["cedula"]);
                    $researchers_new[$i][$t] = $researchers[$i][$t];
                }
            }
            //var_dump($ids);
            $ids = array();
        }



        $array['page'] = $page;
        $array['projects'] = $projects;
        $array['count'] = ceil($count);
        $array['keyword'] = $keyword;
        $array['researchers'] = $researchers_new;
        $array['total'] = $total;

        return $array;
    }

    /**
     * @Route("/projects/{id}", name="project_show")
     * @Template()
     */
    public function showAction($id) {
        $service = $this->get("project.service");
        $project = $service->getProjectById($id);

        $session = new Session();
        $array = array();
        $user = $session->get('user');

        $obj = "";
        $objetives = $service->getGeneralObjectiveByProject($id);
        for ($i = 0; $i < count($objetives); $i++) {
            $obj .= $objetives[$i]["descrip"];
        }
        $vigencias = $service->getVigenciasByProject($id);
        $uacad = $service->getUnidadCAByProject($id);
        $informes = $service->getInformesByProject($id);
        $publicaciones = $service->getPublicacionesByProject($id);
        $researchers = $service->getInvestigadoresByProject($id);
        $financiamiento = $service->getFinanciamientoByProject($id);
        $presupuesto = $service->getPresupuestoByProject($id);
        $presupuestoTotal = self::getProjectPresupuestoTotal($presupuesto);
        $disciplinas = $service->getDisciplinasByProject($id);
        $fondos = $service->getFondosByProject($id);

        $array['project_unit'] = false;
        if ($user) {
            $array['user'] = $user;
            if ($user['type'] == "unit") {
                $serviceU = $this->get("unit.service");
                $projects = $serviceU->getAllProjectsByUnit($user["user"]["unidad"]);
                
                for ($i = 0; $i < count($projects) && $array['project_unit'] == false; $i++) {
                    if (trim($projects[$i]["codigo_proyecto"]) == trim($project["codigo_proyecto"])) {
                        $array['project_unit'] = true;
                    }
                }
            }
        }
        $array['project'] = $project;
        $array['objetive'] = $obj;
        $array['vigencias'] = $vigencias;
        $array['objetives'] = $objetives;
        $array['uacad'] = $uacad;
        $array['informes'] = $informes;
        $array['publicaciones'] = $publicaciones;
        $array['researchers'] = $researchers;
        $array['financiamientos'] = $financiamiento;
        $array['presupuestos'] = $presupuesto;
        $array['disciplinas'] = $disciplinas;
        $array['fondos'] = $fondos;
        $array['presupuestoTotal'] = $presupuestoTotal;


        return $array;
    }

    function getProjectPresupuestoTotal($presupuesto) {
        $rows = array();

        $asignado = 0;
        $ampliaciones = 0;
        $aumentos = 0;
        $disminuciones = 0;
        $subtotal = 0;
        $egresos = 0;
        $disponible = 0;
        if (isset($presupuesto[0]['cuenta_global'])) {
            $global = $presupuesto[0]['cuenta_global'];
            for ($i = 0; $i < count($presupuesto); $i++) {
                if ($global == $presupuesto[$i]['cuenta_global']) {

                    $asignado += $presupuesto[$i]['monto_asignado'];
                    $ampliaciones += $presupuesto[$i]['monto_ampliaciones'];
                    $aumentos += $presupuesto[$i]['monto_aumentos'];
                    $disminuciones += $presupuesto[$i]['monto_disminuciones'];
                    $subtotal += $presupuesto[$i]['monto_subtotal'];
                    $egresos += $presupuesto[$i]['monto_egresos'];
                    $disponible += $presupuesto[$i]['monto_disponible'];
                } else {

                    $tempArray = array('rid' => $i,
                        'monto_asignado' => self::formatNumber($asignado, 2, ',', '.'),
                        'monto_ampliaciones' => self::formatNumber($ampliaciones, 2, ',', '.'),
                        'monto_aumentos' => self::formatNumber($aumentos, 2, ',', '.'),
                        'monto_disminuciones' => self::formatNumber($disminuciones, 2, ',', '.'),
                        'monto_subtotal' => self::formatNumber($subtotal, 2, ',', '.'),
                        'monto_egresos' => self::formatNumber($egresos, 2, ',', '.'),
                        'monto_disponible' => self::formatNumber($disponible, 2, ',', '.'),
                        'cuenta_global' => self::formatNumber($global, 2, ',', '.')
                    );



                    array_push($rows, $tempArray);

                    $asignado = $presupuesto[$i]['monto_asignado'];
                    $ampliaciones = $presupuesto[$i]['monto_ampliaciones'];
                    $aumentos = $presupuesto[$i]['monto_aumentos'];
                    $disminuciones = $presupuesto[$i]['monto_disminuciones'];
                    $subtotal = $presupuesto[$i]['monto_subtotal'];
                    $egresos = $presupuesto[$i]['monto_egresos'];
                    $disponible = $presupuesto[$i]['monto_disponible'];

                    $global = $presupuesto[$i]['cuenta_global'];
                }
            }

            $tempArray = array('rid' => $i,
                'monto_asignado' => self::formatNumber($asignado, 2, ',', '.'),
                'monto_ampliaciones' => self::formatNumber($ampliaciones, 2, ',', '.'),
                'monto_aumentos' => self::formatNumber($aumentos, 2, ',', '.'),
                'monto_disminuciones' => self::formatNumber($disminuciones, 2, ',', '.'),
                'monto_subtotal' => self::formatNumber($subtotal, 2, ',', '.'),
                'monto_egresos' => self::formatNumber($egresos, 2, ',', '.'),
                'monto_disponible' => self::formatNumber($disponible, 2, ',', '.'),
                'cuenta_global' => self::formatNumber($global, 2, ',', '.')
            );

            array_push($rows, $tempArray);
        } else {
            $tempArray = array('rid' => 0,
                'monto_asignado' => self::formatNumber($asignado, 2, ',', '.'),
                'monto_ampliaciones' => self::formatNumber($ampliaciones, 2, ',', '.'),
                'monto_aumentos' => self::formatNumber($aumentos, 2, ',', '.'),
                'monto_disminuciones' => self::formatNumber($disminuciones, 2, ',', '.'),
                'monto_subtotal' => self::formatNumber($subtotal, 2, ',', '.'),
                'monto_egresos' => self::formatNumber($egresos, 2, ',', '.'),
                'monto_disponible' => self::formatNumber($disponible, 2, ',', '.'),
                'cuenta_global' => self::formatNumber(0, 2, ',', '.')
            );

            array_push($rows, $tempArray);
        }

        return $rows;
    }

    function formatNumber($number, $decimals = 0, $thousand_separator = ',', $decimal_point = '.') {
        $tmp1 = round((float) $number, $decimals);

        while (($tmp2 = preg_replace('/(\d+)(\d\d\d)/', '\1 \2', $tmp1)) != $tmp1)
            $tmp1 = $tmp2;

        $n = strtr($tmp1, array(' ' => $thousand_separator, '.' => $decimal_point));

        if (!strpos($n, '.')) {
            $n = $n . '.00';
        }

        return $n;
    }

}
