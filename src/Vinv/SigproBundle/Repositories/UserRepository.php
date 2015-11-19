<?php

namespace Vinv\SigproBundle\Repositories;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserRepository extends Controller {


    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }

    public function getUserByCredentials($credentials, $type) {
        
        $table = $type == "user"? "userID" : "unidad";
        $connection = $this->em->getConnection();
        $user = $credentials['username'];
        $password = md5($credentials['password']);
        $statement = $connection->prepare("SELECT * FROM dbo.$table where login = '$user' and pass = '$password'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getBecaByUser($credentials) {
        $connection = $this->em->getConnection();
        $id = $credentials['id'];
        $statement = $connection->prepare(
                "SELECT p.descrip, e.descrip, year(b.fec_inicio) as fech_inicio, year(b.fec_final) as fech_final, b.descrip FROM sip.dbo.becas b 
                inner join sip.dbo.paises p on p.pais = b.pais
                inner join sip.dbo.entidades e on e.entidad = b.entidad
                where b.cedula = '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getProjectsByUser($credentials) {
        $connection = $this->em->getConnection();
        $id = $credentials['id'];
        $statement = $connection->prepare(
                "SELECT DISTINCT codigo_proyecto
                                ,nombre_proyecto
                                ,nombre_unidad_base
                                ,estado_proyecto
                FROM sip.dbo.Proyectos_Investigadores 
                where cedula_empleado = '$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getDistincionesByUser($id) {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "Select CD.descrip AS distincion,
					year(fecha) as fecha,
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
                "Select entidades.descrip AS entidad, 
					cast(year(fec_inicio)as varchar(04)) as fec_inicio, 
					cast(year(fec_final)as varchar(04)) as fec_final, 
					disciplinas.descrip as disciplina, codigos.descrip AS titulo 
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
    
    public function getAll() {
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("SELECT * FROM dbo.userID");
        $statement->execute();
        $results = $statement->fetchAll();
        return $results;
    }
}


