<?php
require("../conexion.php");
include("global.php");
$cn = conectar();

if($_POST['type']=='FIRST'){
		echo json_encode(array("status"=>"ok","asignatura"=>$_POST['asignatura'],"curso"=>$_POST['curso']));	
}else{
	if($_POST['type']=='ONLINE'){
		
		$curso = $_POST['curso'];
		$asign = $_POST['asignatura'];
		$preguntas = $_POST['pregunta'];
		$qasing = mysql_query("SELECT nombre_asignatura FROM asignatura WHERE idasignatura = ".$asign." ")or die(mysql_error());
		
		while($row_asign = mysql_fetch_array($qasing)){
			$nombre_asignatura = $row_asign[0];//buscar nombre asignatura
		}
		$qalumnos = mysql_query("SELECT
								  Alumno.idalumno
								FROM curso Curso,
								  alumno_has_curso Has,
								  alumno Alumno
								WHERE Curso.idcurso = Has.curso_idcurso
								    AND Has.alumno_idalumno = Alumno.idalumno
								    AND Curso.idcurso = ".$curso." ")or die(mysql_error());
		$alumnos = array();							
		while($ralum = mysql_fetch_array($qalumnos)){
			$alumnos[] = $ralum[0];//array con ids de alumnos
		}
		$join_alumnos = join(",",$alumnos);							
		for($i=0; $i<=count($alumnos)-1; $i++){
			mysql_query("INSERT INTO prueba
						            (nombre,
						             alumno_idalumno,
						             fechaHora_inicio,
						             fechaHora_termino)
							VALUES ('".$nombre_asignatura."',
							        ".$alumnos[$i].",
							        NOW(),
							        NOW())")or die(mysql_error());
		}
		$qprueba = mysql_query("SELECT prueba.idprueba FROM prueba WHERE alumno_idalumno IN (".$join_alumnos.")")or die(mysql_error());
		while($rpr = mysql_fetch_array($qprueba)){
			$ids_prueba[] = $rpr[0];
		}
		for($i = 0; $i <= count($ids_prueba)-1; $i++){
			for($j= 0; $j <= count($preguntas)-1; $j++){
				mysql_query("INSERT INTO detalle_prueba
							            (prueba_idprueba,
							             iddificultad,
							             idcontenido,
							             cantidad)
							VALUES (".$ids_prueba[$i].",
							        ".$preguntas[$j]['dificultad'].",
							        ".$preguntas[$j]['contenido'].",
							        ".$preguntas[$j]['cantidad'].");")or die(mysql_error());
			}
		}
		echo json_encode(array("status"=>"ok"));
	}
}	
?>
