<?php

namespace Vinv\SigproBundle\Repositories;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProjectRepository extends Controller {

    protected $em;

    public function __construct(\Doctrine\ORM\EntityManager $em) {
        $this->em = $em;
    }
    
    public function getProjectById($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            select xprouni.unidadc as codigo_unidad, proyectos.descrip as nombre, proyectos.proyecto as codigo_proyecto, unidades.descrip as unidad, TI.descrip AS tipo_invest, CR.descrip as tipo_finan,  
					EP.descrip as estado, descr_ubi as ubicacion, TP.descrip as tipo_proyecto 
                    From proyectos, xprouni, codigos as TI,codigos as CR,codigos as EP, ubicacion,codigos as TP, unidades  
                    where proyecto = '$id' 
                    and unidades.unidad = xprouni.unidadc  
                    and tipoc = 1  
                    and xprouni.proyectoc = proyectos.proyecto  
                    and TI.tipo = 13 and TI.codigo = tipo_invest  
                    and CR.tipo = 2  and CR.codigo = tipo_financ  
                    and EP.tipo = 12 and EP.codigo = estado_proy  
                    and ubicacion.ubicacion = proyectos.ubicacion  
                    and TP.tipo = 21 and TP.codigo = tipo_proy");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results[0];
    }
    
    public function getAll($page, $items = 20) {
        $page--;
        $low = $page * $items;
        $high = $low + $items;
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            SELECT *
                FROM (SELECT 
                        Row_Number() OVER (ORDER BY nombre_proyecto) AS RowIndex, codigo_proyecto as codigo, nombre_proyecto as nombre, estado_proyecto as estado, codigo_estadoproyecto as cestado, u.descrip as unidad
  FROM DatosGeneralesProyectos p 
 left join unidades u on u.unidad = p.codigo_unidad_responsable_vi
                    ) AS sub
                WHERE
                    sub.RowIndex > $low
                    AND sub.RowIndex <= $high");

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
                        Row_Number() OVER (ORDER BY p.descrip) AS RowIndex, codigo_proyecto as codigo, nombre_proyecto as nombre, estado_proyecto as estado, u.descrip as unidad
  FROM DatosGeneralesProyectos p 
 left join unidades u on u.unidad = p.codigo_unidad_responsable_vi
                        where nombre_proyecto LIKE '%$keyword%'
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
            select count(*) as count FROM DatosGeneralesProyectos p 
                left join sip.dbo.unidades u on u.unidad = p.codigo_unidad_responsable_vi");

        $statement->execute();

        $results = $statement->fetchAll();
        
        return $results;
    }
    
    public function getCountbyKeyword($keyword) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare("
            select count(*) as count From sip.dbo.proyectos p 
                inner join sip.dbo.codigos c on c.codigo = p.estado_proy and c.tipo = 12
                left join sip.dbo.unidades u on u.unidad = p.unidad
                where p.descrip LIKE '%$keyword%'");

        $statement->execute();

        $results = $statement->fetchAll();
        
        return $results;
    }
    
    function paginate($dql, $pageSize = 10, $currentPage = 1)
{
    $paginator = new Paginator($dql);
 
    $paginator
        ->getQuery()
        ->setFirstResult($pageSize * ($currentPage - 1)) // set the offset
        ->setMaxResults($pageSize); // set the limit
 
    return $paginator;
}

    public function getDisciplinasByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "SELECT disciplinas.descrip FROM disciplinas 
                    INNER JOIN xdispro ON disciplinas.disciplina = xdispro.disciplina 
                    WHERE (xdispro.proyecto = '$id')");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
        public function getUnidadCAByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "select unidades.descrip AS UNIDADA From xprouni, unidades
					 where proyectoc = '".$id."'
					 and unidades.unidad = xprouni.unidadc
					 and tipoc = 1");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results[0];
    }
    
    public function getInformesByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "select informes.informe, informes.numero, codigos.descrip, 
                    convert(char(10),informes.fec_entrega,103) as fec_entregaF, 
                    convert(char(10),informes.fec_entregado,103) as fec_entregadoF
		from informes, codigos
		where informes.proyecto = '$id'
		and codigos.tipo = 17
		and codigos.codigo = informes.estado
		order by informes.numero");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getPublicacionesByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "Select publicacion, CT.descrip as TIPO, revistas.descrip AS REVISTA, 
							CA.descrip AS  AMBITO, ref_biblio AS REFE, ano   
                            From codigos AS CT,codigos AS CA,publicaciones,revistas,unidades   
                            where proyecto = '$id'  
                            and CT.tipo = 16   
                            and CT.codigo = publicaciones.tipo   
                            and CA.tipo = 7   
                            and CA.codigo = publicaciones.ambito   
                            and revistas.revista = publicaciones.revista  
                            and unidades.unidad = publicaciones.unidad  
                            order by ano");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getInvestigadoresByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "Select datos_per.cedula,apellido1,apellido2,nombre,codigos.descrip AS PARTICIPA,(rtrim(convert(char,dedicacion.dedicacion)) + ' - ' + dedicacion.descrip) AS TIEMPO, 
			 convert(char(10),fec_inicio,103) as fec_inicioF, 
			 convert(char(10),fec_final,103) as fec_finalF, 
    			monto_ca 
				From xproinv, codigos, dedicacion, datos_per  
			   WHERE xproinv.proyecto = '$id'
			   and datos_per.cedula = xproinv.cedula and codigos.codigo = participacion and codigos.tipo = 1 
			   and dedicacion.dedicacion = xproinv.dedicacion 
			   order by fec_final desc");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getVigenciasByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "Select codigos.descrip AS TVIGENCIA, 
                            convert(char(10),fec_inicio,103) as fec_inicioF, 
                            convert(char(10),fec_final,103) as fec_finalF  
                            From vigencias,codigos   
                            where vigencias.proyecto = '".$id."' 
                            and codigos.codigo = vigencias.vigencia   
                            and codigos.tipo = 15   
                            order by fec_final desc");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getObjectivesByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "select tipo,descrip from objetivos where proyecto='".$id."' order by linea");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getGeneralObjectiveByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "select tipo,descrip from objetivos where proyecto='".$id."' and tipo='G' order by linea");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getPresupuestoByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
                "select * 
					from EstadoPresupuestarioProyectos 
					where codigo_proyecto='$id'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    public function getFinanciamientoByProject($id) {
        
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
            "Select convenios.nombre, entidades.descrip AS enti, monto, descripcion, A1.descrip as administra,cuenta,A2.descrip as modalidad,
		        convert(char(10),fec_inicio,103) as fec_inicioF, 
				convert(char(10),fec_final,103) as fec_finalF
		      From xproconvent,entidades,convenios, codigos as A1,codigos as A2
                           where convenios.proyecto = '".$id."'
                           and   xproconvent.convenio = convenios.convenio
                           AND entidades.entidad = xproconvent.entidad
                           and A1.tipo = 35
                           and A1.codigo = id_administra
                           and A2.tipo = 44
                           and A2.codigo = id_modalidad_vinculacion
                           order by convenios.convenio");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    function getFondosByProject($id){
	
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
            "select novi,nounidad,norectoria,monto,porcen,
				convert(char(10),veinicio,103) as veinicioF,					
				convert(char(10),vefinal,103) as vefinalF,
				   cuenta from fondodesin
				   where proyecto='".$id."'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    function getDescriptoresByProject($id){
	
        $connection = $this->em->getConnection();
        $statement = $connection->prepare(
            "SELECT d.descriptor as codigo, d.descrip as nombre
                FROM [sip].[dbo].[xprodes] pd 
            left join sip.dbo.proyectos p on p.proyecto = pd.proyecto  
            left join sip.dbo.descriptores d on d.descriptor = pd.descriptor 
            where p.proyecto = '".$id."'");

        $statement->execute();

        $results = $statement->fetchAll();
        return $results;
    }
    
    
    
}


