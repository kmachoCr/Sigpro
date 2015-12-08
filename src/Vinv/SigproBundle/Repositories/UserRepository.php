<?php

namespace Vinv\SigproBundle\Repositories;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserRepository extends Controller {

    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getUserByCredentials($credentials, $type) {

        switch ($type) {
            case "researcher":
                $table = "userID";
                break;
            case "unit":
                $table = "unidades";
                break;
            case "admin":
                $table = "user_admin";
                break;
        }
        $connection = $this->em->getConnection();
        $user = $credentials['username'];
        $password = md5($credentials['password']);
        $statement = $connection->prepare("SELECT * FROM dbo.$table where login = '$user' and pass = '$password'");
        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getBecasByUser($id) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "SELECT p.descrip as pais, e.descrip as entidad, year(b.fec_inicio) as anio_inicio, year(b.fec_final) as anio_final, b.descrip as descripcion FROM sip.dbo.becas b 
                inner join sip.dbo.paises p on p.pais = b.pais
                inner join sip.dbo.entidades e on e.entidad = b.entidad
                where b.cedula = '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getProjectsByUser($id) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "SELECT DISTINCT codigo_proyecto as codigo
                                ,nombre_proyecto as nombre
                                ,nombre_unidad_base as unidad
				,pri.codigo_unidad_responsable_vi as unidad_c
                                ,estado_proyecto as estado
                FROM sip.dbo.Proyectos_Investigadores pri 
                where cedula_empleado = '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getDistincionesByUser($id) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "Select CD.descrip AS distincion,
					year(fecha) as anio,
					entidades.descrip as entidad, 
					CA.descrip as ambito ,distinciones.descrip as descripcion 
					From distinciones, entidades, codigos AS CD, codigos AS CA
					where cedula = '$id'
					and CD.tipo = 6 
					and CD.codigo = distinciones.distincion 
					and CA.tipo = 7 
					and CA.codigo = distinciones.ambito 
					and entidades.entidad = distinciones.entidad 
					order by fecha");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getEstudiosByUser($id) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "Select entidades.descrip as entidad, 
					cast(year(fec_inicio)as varchar(04)) as anio_inicio, 
					cast(year(fec_final)as varchar(04)) as anio_final, 
					disciplinas.descrip as disciplina, codigos.descrip as titulo 
					 From estudios, Disciplinas, entidades, codigos 
					 where cedula = '$id'
					 and Disciplinas.Disciplina = estudios.Disciplina 
					 and entidades.entidad = estudios.universidad 
					 and codigos.codigo = estudios.titulo 
					 and codigos.tipo = 8 
					 order by fec_inicio");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getCapacitacionesByUser($id) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "select paises.descrip AS pais,
				   cast(year(fecha)as varchar(04)) as anio, 
				   partic_activa,CF.descrip as funcion,
				   reuniones.descrip as capacitacion
				   From reuniones,paises,codigos AS CR, codigos AS CA, codigos AS CF
				   where cedula = '$id'
				   and CR.tipo = 11 
				   and CR.codigo = reuniones.reunion 
				   and CF.tipo = 10 
				   and CF.codigo = reuniones.funcion 
				   and CA.tipo = 7 
				   and CA.codigo = reuniones.ambito 
				   and paises.pais = reuniones.pais 
				   order by fecha");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getAll($page, $items = 20) {
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
            SELECT count(*) as count From sip.dbo.datos_per as d, sip.dbo.codigos as c, sip.dbo.userID as u
                            where c.tipo = 4
                            and c.codigo = d.estado
                            and u.Cedula = d.cedula");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getCountByKeyword($keyword) {

        $connection = $this->em->getConnection();
        $whereClause = "";
        $keywords = split(" ", $keyword);
        for ($i = 0; $i < count($keywords); $i++) {
            $whereClause .= "d.nombre like '%$keywords[$i]%' or d.apellido1 like '%$keywords[$i]%' or d.apellido2 like '%$keywords[$i]%' ";
            count($keywords) - 1 !== $i ? $whereClause .= "or " : "";
        }
        $statement = $connection->prepare("
            SELECT count(*) as count From sip.dbo.datos_per as d, sip.dbo.codigos as c, sip.dbo.userID as u
                            where c.tipo = 4
                            and c.codigo = d.estado
                            and u.Cedula = d.cedula
                            and ($whereClause)");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getByKeyword($page, $keyword, $items = 20) {
        $page--;
        $low = $page * $items;
        $high = $low + $items;
        $whereClause = "";
        $keywords = split(" ", $keyword);
        for ($i = 0; $i < count($keywords); $i++) {
            $whereClause .= "d.nombre like '%$keywords[$i]%' or d.apellido1 like '%$keywords[$i]%' or d.apellido2 like '%$keywords[$i]%' ";
            count($keywords) - 1 !== $i ? $whereClause .= "or " : "";
        }
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT *
                FROM (SELECT 
                        Row_Number() OVER (ORDER BY d.apellido1) AS RowIndex, d.nombre, d.apellido1, d.apellido2, c.descrip as estado, d.cedula, u.Email as email From sip.dbo.datos_per as d, sip.dbo.codigos as c, sip.dbo.userID as u
                            where c.tipo = 4
                            and c.codigo = d.estado
                            and u.Cedula = d.cedula
                            and ($whereClause)
                    ) AS sub
                WHERE
                    sub.RowIndex > $low
                    AND sub.RowIndex <= $high");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }

    public function getInfo($id) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            select d.nombre, d.apellido1, d.apellido2, d.sexo as genero, un.descrip as unidad, cca.descrip as CA, d.grado_acad as grado, c.descrip as estado, d.cedula as cedula, u.Email as email, d.fec_nacimi as nacimiento, p.descrip as pais_nacimiento, pn.descrip as nacionalidad  From sip.dbo.datos_per as d, sip.dbo.codigos as c, sip.dbo.userID as u, sip.dbo.paises as p, sip.dbo.paises as pn, sip.dbo.unidades as un, sip.dbo.codigos as cca
                            where c.tipo = 4
                            and c.codigo = d.estado
                            and cca.tipo = 3
                            and cca.codigo = d.estado
                            and un.unidad = d.unidad_base
                            and u.Cedula = d.cedula
                            and p.pais = d.pais_nacim
                            and pn.pais = d.pais_nacio
                            and d.cedula = '$id'");
        $statement->execute();
        $results = $statement->fetchAll();
        return $results[0];
    }

}
