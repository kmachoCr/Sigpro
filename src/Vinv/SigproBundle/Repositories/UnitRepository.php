<?php

namespace Vinv\SigproBundle\Repositories;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UnitRepository extends Controller {

    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getAll() {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
                SELECT u.unidad as unidad_c 
                ,u.descrip as unidad
                ,a.descrip as area
                ,director as director
            FROM sip.dbo.unidades u
            inner join sip.dbo.areas a on a.area = u.area");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getInfoByUnit($id) {

        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT DISTINCT 
                 codigo_proyecto
                ,nombre_proyecto
                ,nombre_unidad_base
		,codigo_unidad_base
                ,estado_proyecto
            FROM sip.dbo.Proyectos_Investigadores 
            where codigo_unidad_base = '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getProjectsByUnit($id) {

        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT p.proyecto as codigo_proyecto, p.descrip as nombre, pri.nombre_unidad_base, pri.estado_proyecto as estado FROM sip.dbo.proyectos p 
                    inner join sip.dbo.Proyectos_Investigadores pri on pri.codigo_unidad_responsable_vi = p.unidad
                    where p.unidad = '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getInfoInv2($id) {

        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            select paises.descrip AS PaisN, CR.descrip AS RegimenA, unidades.abrevi AS Uadcr, telefono
                    from datos_per, paises, unidades,codigos AS CR 
                    where cedula = '" . $id . "' 
                    and paises.pais = datos_per.pais_nacio  
                    and CR.tipo = 3 
                    and CR.codigo = datos_per.categ_ra 
                    and unidades.unidad = datos_per.unidad_adsc");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getInv($id) {

        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            select d.nombre, d.apellido1, d.apellido2, c.descrip as estado, d.cedula, u.Email as email From sip.dbo.datos_per as d, sip.dbo.codigos as c, sip.dbo.userID as u
                            where c.tipo = 4
                            and c.codigo = d.estado
                            and u.Cedula = d.cedula
                            and d.unidad_base = '$id' order by apellido1");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

}
