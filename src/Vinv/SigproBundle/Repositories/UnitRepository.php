<?php

namespace Vinv\SigproBundle\Repositories;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UnitRepository extends Controller {

    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getAll($page, $items = 20) {
        $page--;
        $low = $page * $items;
        $high = $low + $items;
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT *
                FROM (SELECT 
                        Row_Number() OVER (ORDER BY u.descrip) AS RowIndex, u.unidad as unidad_c ,u.descrip as unidad,a.descrip as area,director as director
                    FROM sip.dbo.unidades u
                        inner join sip.dbo.areas a on a.area = u.area
                    ) AS sub
                WHERE
                    sub.RowIndex > $low
                    AND sub.RowIndex <= $high");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getCount() {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT count(*) as count 
                    FROM sip.dbo.unidades u
                    inner join sip.dbo.areas a on a.area = u.area");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getCountByKeyword($keyword) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT count(*) as count 
                    FROM sip.dbo.unidades u
                    inner join sip.dbo.areas a on a.area = u.area
                    where u.descrip LIKE '%$keyword%'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getByKeyword($page, $keyword, $items = 20) {
        $page--;
        $low = $page * $items;
        $high = $low + $items;
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT *
                FROM (SELECT 
                        Row_Number() OVER (ORDER BY u.descrip) AS RowIndex, u.unidad as unidad_c ,u.descrip as unidad,a.descrip as area,director as director
                    FROM sip.dbo.unidades u
                        inner join sip.dbo.areas a on a.area = u.area
                        where u.descrip LIKE '%$keyword%'
                    ) AS sub
                WHERE
                    sub.RowIndex > $low
                    AND sub.RowIndex <= $high");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getInfoByUnit($id) {

        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT u.descrip as name, u.director, u.unidad, a.descrip as area, u.email, u.telefono, u.direccion FROM sip.dbo.unidades u inner join
		sip.dbo.areas a on u.area = a.area
            where unidad = '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results[0];
    }

    
    
    public function getProjectsByUnit($id, $page, $items = 20) {
        $page--;
        $low = $page * $items;
        $high = $low + $items;
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT *
                FROM (SELECT 
                        Row_Number() OVER (ORDER BY p.descrip) AS RowIndex, c.codigo as cestado, p.proyecto as codigo_proyecto, p.descrip as nombre, c.descrip as estado from sip.dbo.proyectos as p, sip.dbo.codigos c
                        where c.codigo = p.estado_proy
                        and c.tipo = 12
                        and p.unidad =  '$id'
                    ) AS sub
                WHERE
                    sub.RowIndex > $low
                    AND sub.RowIndex <= $high");

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
    
    
    public function getInv($id, $page, $items = 20) {
        $page--;
        $low = $page * $items;
        $high = $low + $items;
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT *
                FROM (SELECT 
                        Row_Number() OVER (ORDER BY d.apellido1) AS RowIndex, d.nombre, d.apellido1, d.apellido2, c.descrip as estado, d.cedula, u.Email as email From sip.dbo.datos_per as d, sip.dbo.codigos as c, sip.dbo.userID as u
                            where c.tipo = 4
                            and c.codigo = d.estado
                            and u.Cedula = d.cedula
                            and d.unidad_base = '$id'
                    ) AS sub
                WHERE
                    sub.RowIndex > $low
                    AND sub.RowIndex <= $high order by apellido1");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getAllInv($id) {
 
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT d.nombre, d.apellido1, d.apellido2, c.descrip as estado, d.cedula, u.Email as email From sip.dbo.datos_per as d, sip.dbo.codigos as c, sip.dbo.userID as u
                            where c.tipo = 4
                            and c.codigo = d.estado
                            and u.Cedula = d.cedula
                            and d.unidad_base = $id");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getAllProjectsByUnit($id) {

        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT p.proyecto as codigo_proyecto, p.descrip as nombre, c.descrip as estado from sip.dbo.proyectos as p, sip.dbo.codigos c
                        where c.codigo = p.estado_proy
                        and c.tipo = 12
                        and p.unidad =  '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

}
