<?php

namespace Vinv\SigproBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ProjectController extends Controller {

    /**
     * @Route("/projects/page/{page}", name="projects")
     * @Template()
     */
    public function indexAction($page) {
        $service = $this->get("project.service");
        $request = $this->get('request');
        $keyword = $request->query->get('keyword');
        
        if(isset($keyword) && $keyword != ""){
            $projects = $service->getByKeyword($page, $keyword, 15);
        }else{
            $projects = $service->getAll($page, 15);
        }
        
        $researchers = array();
        for ($i = 0; $i < count($projects); $i++) {
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
    public function showAction($id) {
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
        $presupuestoTotal = self::getProjectPresupuestoTotal($presupuesto);
        $disciplinas = $service->getDisciplinasByProject($id);
        $fondos = $service->getFondosByProject($id);

        //var_dump($presupuestoTotal);
        return array(
            'project' => $project,
            'objetives' => $objetives,
            'vigencias' => $vigencias,
            'objetives' => $objetives,
            'uacad' => $uacad,
            'informes' => $informes,
            'publicaciones' => $publicaciones,
            'researchers' => $researchers,
            'financiamientos' => $financiamiento,
            'presupuestos' => $presupuesto,
            'disciplinas' => $disciplinas,
            'fondos' => $fondos,
            'presupuestoTotal' => $presupuestoTotal
        );
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
