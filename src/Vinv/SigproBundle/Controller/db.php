	<?php
include("dbconnect.php");

function getData($query){

	$result = execQuery($query);
	
	$rows = array();
		
	while($row = mssql_fetch_array($result,MSSQL_ASSOC)){
		
		array_push($rows,$row);
		
	}
	
	return $rows;
}

function writeData($query){
	
	return execQuery($query);
	
}

function getInfoInv($userId){

	$query = "select direccion, sexo, convert(char(10),fec_nacimi,103) as fec_nacimi, pais_nacim, bitnet, unidad_base,
				   convert(char(10),fec_adscrip1,103) as fec_adscrip1,
				   convert(char(10),fec_adscrip2,103) as fec_adscrip2,
					paises.descrip AS Nacio, unidades.abrevi AS Ubase
				   from datos_per, paises, unidades
				   where cedula = '".$userId."' 
				   and paises.pais = datos_per.pais_nacim
				   and unidades.unidad = datos_per.unidad_base";
	
	$row = getData($query);
	
	return $row;

}

function getInfoInv2($userId){
	$query = "select paises.descrip AS PaisN, CR.descrip AS RegimenA, unidades.abrevi AS Uadcr, telefono
                    from datos_per, paises, unidades,codigos AS CR 
                    where cedula = '".$userId."' 
                    and paises.pais = datos_per.pais_nacio  
                    and CR.tipo = 3 
                    and CR.codigo = datos_per.categ_ra 
                    and unidades.unidad = datos_per.unidad_adsc ";
	
	$row = getData($query);
	
	return $row;
}

function getInfoInv3($userId){
	$query = "select CA.descrip AS BGrado, CE.descrip AS BEstado,CR.descrip AS BRelacion, direccion
     From datos_per, codigos as CA,codigos as CE,codigos as CR
                            where cedula = '".$userId."' 
                            and CA.tipo = 31 
                            and CA.codigo = datos_per.grado 
                            and CR.tipo = 18 
                            and CR.codigo = datos_per.relacion_vi 
                            and CE.tipo = 4
                            and CE.codigo = datos_per.estado";
	
	$row = getData($query);
	
	return $row;
}

/* devuelve los datos del investigador para desplegar en el header del nombre y ced. del investigador*/
function getInvName($userId){

	$query = "select nombre,apellido1,apellido2,cedula from datos_per where datos_per.cedula='".$userId."'";
	
	$row = getData($query);
	
	return $row;
}

/* devuelve los datos del proyecto para desplegar en el header del nombre y codigo del proyecto */
function getProjName($projectId){

	$query = "select descrip, unidad,proyecto from proyectos where proyectos.proyecto='".$projectId."'";
	
	$row = getData($query);
	
	return $row;
}

/* devuelve los datos del proyecto para desplegar en el header del nombre y codigo del proyecto */
function getProjInfo($projectId){

	$query = "select xprouni.unidadc,  unidades.descrip AS UNIDADP, TI.descrip AS TIPOINVES, CR.descrip AS TIPOFINAN,  
					EP.descrip AS ESTADOPROY, descr_ubi AS UBICA, TP.descrip AS TIPOPROY 
                    From proyectos, xprouni, codigos as TI,codigos as CR,codigos as EP, ubicacion,codigos as TP, unidades  
                    where proyecto = '".$projectId."' 
                    and unidades.unidad = xprouni.unidadc  
                    and tipoc = 1  
                    and xprouni.proyectoc = proyectos.proyecto  
                    and TI.tipo = 13 and TI.codigo = tipo_invest  
                    and CR.tipo = 2  and CR.codigo = tipo_financ  
                    and EP.tipo = 12 and EP.codigo = estado_proy  
                    and ubicacion.ubicacion = proyectos.ubicacion  
                    and TP.tipo = 21 and TP.codigo = tipo_proy ";
	
	$row = getData($query);
	
	return $row;
}

function getProjDisciplinas($projectId){

	$query = 	"SELECT     disciplinas.descrip
					FROM         disciplinas INNER JOIN
                    xdispro ON disciplinas.disciplina = xdispro.disciplina
					WHERE     (xdispro.proyecto = '".$projectId."')";
	
	$row = getData($query);
	
	return $row;
}


function getProjUniCarga($projectId){

	$query = 	"select unidades.descrip AS UNIDADA From xprouni, unidades
					 where proyectoc = '".$projectId."'
					 and unidades.unidad = xprouni.unidadc
					 and tipoc = 1";
	
	$row = getData($query);
	
	return $row;
}

function getProjPublicaciones($projectId){

	$query = 	"Select publicacion, CT.descrip as TIPO, revistas.descrip AS REVISTA, 
							CA.descrip AS  AMBITO, ref_biblio AS REFE, ano   
                            From codigos AS CT,codigos AS CA,publicaciones,revistas,unidades   
                            where proyecto = '".$projectId."'  
                            and CT.tipo = 16   
                            and CT.codigo = publicaciones.tipo   
                            and CA.tipo = 7   
                            and CA.codigo = publicaciones.ambito   
                            and revistas.revista = publicaciones.revista  
                            and unidades.unidad = publicaciones.unidad  
                            order by ano ";
	
	$row = getData($query);
	
	return $row;
}


function getProjVigencias($projectId){

	$query = 	"Select codigos.descrip AS TVIGENCIA, 
							convert(char(10),fec_inicio,103) as fec_inicioF, 
							convert(char(10),fec_final,103) as fec_finalF  
                             From vigencias,codigos   
                             where vigencias.proyecto = '".$projectId."' 
                             and codigos.codigo = vigencias.vigencia   
                             and codigos.tipo = 15   
                             order by fec_final desc";
	
	$row = getData($query);
	
	return $row;
}




function getInvDistinciones($userId){

	$query = "Select CD.descrip AS BDISTINCION,
					cast(year(fecha)as varchar(04)) as fechaF,
					entidades.descrip AS BENTIDAD, 
					CA.descrip AS BAMBITO ,distinciones.descrip as BDESCRIP
					From distinciones, entidades, codigos AS CD, codigos AS CA
					where cedula = '".$userId."'
					and CD.tipo = 6 
					and CD.codigo = distinciones.distincion 
					and CA.tipo = 7 
					and CA.codigo = distinciones.ambito 
					and entidades.entidad = distinciones.entidad 
					order by fecha";

	$row = getData($query);
	
	return $row;

}

function getInvBecas($userId){

	$query = "Select paises.descrip AS BPAIS,entidades.descrip AS BENTIDAD, 
					cast(year(fec_inicio)as varchar(04)) as fec_inicioF, 
					cast(year(fec_final)as varchar(04)) as fec_finalF,				    
					becas.descrip as BDESCRIP 
					From becas, paises, entidades 
					where cedula = '".$userId."' 
					and paises.pais = becas.pais 
					and entidades.entidad = becas.entidad 
					order by fec_inicio";

	$row = getData($query);
	
	return $row;

}

function getInvEstudios($userId){

	$query = "Select entidades.descrip AS BENTIDAD, 
					cast(year(fec_inicio)as varchar(04)) as fec_inicioF, 
					cast(year(fec_final)as varchar(04)) as fec_finalF, 
					disciplinas.descrip as BDISCI, codigos.descrip AS BTITULO 
					 From estudios, Disciplinas, entidades, codigos 
					 where cedula = '".$userId."'
					 and Disciplinas.Disciplina = estudios.Disciplina 
					 and entidades.entidad = estudios.universidad 
					 and codigos.codigo = estudios.titulo 
					 and codigos.tipo = 8 
					 order by fec_inicio";

	$row = getData($query);
	
	return $row;

}

function getInvReuniones($userId){

	$query = "Select paises.descrip AS BPAIS,
				   cast(year(fecha)as varchar(04)) as fechaF, 	
				   CR.descrip AS BREUNION, 
				   CA.descrip AS BAMBITO ,partic_activa,CF.descrip as BFUNCION,
				   reuniones.descrip as BDESCRIP
				   From reuniones,paises,codigos AS CR, codigos AS CA, codigos AS CF
				   where cedula = '".$userId."'
				   and CR.tipo = 11 
				   and CR.codigo = reuniones.reunion 
				   and CF.tipo = 10 
				   and CF.codigo = reuniones.funcion 
				   and CA.tipo = 7 
				   and CA.codigo = reuniones.ambito 
				   and paises.pais = reuniones.pais 
				   order by fecha";

	$row = getData($query);
	
	return $row;

}

function getProjFinanciamiento($projectId){

	$query = "Select entidades.entidad,entidades.descrip,monto
     From [sip].[dbo].xproconvent, [sip].[dbo].entidades
where xproconvent.proyecto= '".$projectId."'
         and xproconvent.entidad = entidades.entidad
         order by entidades.descrip";
						   
	$row = getData($query);
	return $row;

}

function getProjConvenios($projectId){
	
	$query = "Select convenios.nombre, entidades.descrip AS enti, monto, descripcion, A1.descrip as administra,cuenta,A2.descrip as modalidad,
		        convert(char(10),fec_inicio,103) as fec_inicioF, 
				convert(char(10),fec_final,103) as fec_finalF
		      From xproconvent,entidades,convenios, codigos as A1,codigos as A2
                           where convenios.proyecto = '".$projectId."'
                           and   xproconvent.convenio = convenios.convenio
                           AND entidades.entidad = xproconvent.entidad
                           and A1.tipo = 35
                           and A1.codigo = id_administra
                           and A2.tipo = 44
                           and A2.codigo = id_modalidad_vinculacion
                           order by convenios.convenio";
						   
	$row = getData($query);
	
	return $row;
	
}

function getProjInformes($projectId){
	$query = "select informes.informe, informes.numero, codigos.descrip, 
		convert(char(10),informes.fec_entrega,103) as fec_entregaF, 
    	convert(char(10),informes.fec_entregado,103) as fec_entregadoF
		from informes, codigos
		where informes.proyecto = '".$projectId."'
		and codigos.tipo = 17
		and codigos.codigo = informes.estado
		order by informes.numero";
		
	$row = getData($query);
	
	return $row;
}



function getProjInvestigadores($projectId){
	$query = "Select apellido1,apellido2,nombre,codigos.descrip AS PARTICIPA,(rtrim(convert(char,dedicacion.dedicacion)) + ' - ' + dedicacion.descrip) AS TIEMPO, 
			 convert(char(10),fec_inicio,103) as fec_inicioF, 
			 convert(char(10),fec_final,103) as fec_finalF, 
    			monto_ca 
				From xproinv, codigos, dedicacion, datos_per  
			   WHERE xproinv.proyecto = '".$projectId."'
			   and datos_per.cedula = xproinv.cedula and codigos.codigo = participacion and codigos.tipo = 1 
			   and dedicacion.dedicacion = xproinv.dedicacion 
			   order by fec_final desc";
		
	$row = getData($query);
	
	return $row;
}





function getProjFondos($projectId){
	
	$query = "select novi,nounidad,norectoria,monto,porcen,
				convert(char(10),veinicio,103) as veinicioF,					
				convert(char(10),vefinal,103) as vefinalF,
				   cuenta from fondodesin
				   where proyecto='".$projectId."'";
						   
	$row = getData($query);
	
	return $row;
	
}

function getProjObjetivos($projectId){

	$query = "select tipo,descrip 
				   from objetivos where proyecto='".$projectId."' order by linea";


	$row = getData($query);
	
	return $row;


}

function getProjPresupuesto($projectId){

	$query = "select * 
					from EstadoPresupuestarioProyectos 
					where codigo_proyecto='".$projectId."' ";
					
	$row = getData($query);
	
	return $row;
} 



function getProjPartida($projectId,$partida){

	$query = "SET DATEFORMAT DMY; SELECT 
				rtrim(Proyecto) Proyecto, 
				rtrim(partida) Partida, 
				convert(char(10),fecha_transaccion,103)  'FechaTrans' , 
				convert(varchar,fecha_doc,103) 'FechaDoc', 
				rtrim(Documento) Documento,  
				convert(varchar,fecha_vigencia,103) 'MesBeca',  
				convert(varchar,monto) Monto,  
				rtrim(descrip) 'Descripcion', 
				rtrim(carnet) Carnet, 
				rtrim(cedula) Cedula, 
				convert(char(10),fechadel,103) 'FechaInicio', 
				convert(char(10),fechaal,103) 'FechaFinal', 
				mensual 'Horas', 
				tipo_traslado, 
				movimiento, 
				global, 
				descrip2,
				unidad 

				FROM movimi 

				WHERE 
				(movimiento = 143 or movimiento = 243) and 
				estado <> 2  AND 
				movimi.global = 262 AND 
				proyecto = '".$projectId."' AND 
				partida = '".$partida."' 
				order by fecha_transaccion asc";
/*MODIFICAR CAMBIAR en partida = # por ".$partida." ahora esta con datos de prueba
tambien proyecto esta hardcoded*/

	$row = getData($query);
	
	return $row;
} 




function getProjInv($userId){
	$query = "select xproinv.proyecto, proyectos.descrip
	 		  from xproinv, proyectos
			  where cedula ='".$userId."' and xproinv.proyecto = proyectos.proyecto order by xproinv.proyecto desc";
	
	$row = getData($query);
	
	return $row;
}

function getInvPrincipal($userId,$projectId){
	$query = "select * from InvsPrincipales_Actuales where cedula ='".$userId."' and codigo_proyecto = '".$projectId."'";
	
	$row = getData($query);
	
	return $row;
}

function updateDatosPer($userId, $email,$telefono,$direccion,$fecha){
	$query = "update datos_per set bitnet='".$email."', telefono='".$telefono."', direccion= '".$direccion."', fec_nacimi='".$fecha."' where cedula = '".$userId."'";
	
	return writeData($query);
}


function replaceEntities($str)
{
	$from = array(' ', '&', 'ñ','Ñ','á','Á','é','É','í','Í','ú','Ú','ó','Ó','®');
	$to = array(' ', '&amp;', '&ntilde;', '&Ntilde;','&aacute;','&Aacute;','&eacute;','&Eacute;','&iacute;','&Iacute;','&uacute;','&Uacute;','&oacute;','&Oacute;','&reg;');
	
	return str_replace($from, $to, $str);
}


function FormatNumber($number, $decimals = 0, $thousand_separator = ',', $decimal_point = '.')
{
  $tmp1 = round((float) $number, $decimals);

  while (($tmp2 = preg_replace('/(\d+)(\d\d\d)/', '\1 \2', $tmp1)) != $tmp1)
    $tmp1 = $tmp2;
	
  $n = strtr($tmp1, array(' ' => $thousand_separator, '.' => $decimal_point));

  if(!strpos($n,'.')){
	  $n = $n.'.00';
  }

  return $n;

  
} 


?>