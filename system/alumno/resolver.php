<?php 
session_start();
include("options.php");
 
 
$query = mysql_query("SELECT
						  Prueba.idprueba
						FROM prueba Prueba
						WHERE Prueba.alumno_idalumno = ".$_SESSION['user_id']."
						    AND Prueba.estado = 'ACTIVA'")or die(mysql_error());
							
while($row = mysql_fetch_array($query)){
	$id_prueba = $row[0];
}	
 
$query_detalle = mysql_query("SELECT
							  Detalle.iddificultad,
							  Detalle.idcontenido,
							  Detalle.cantidad
							FROM detalle_prueba Detalle
							WHERE Detalle.prueba_idprueba = ".$id_prueba." ")or die(mysql_error());
$dificultades = array();
$contenidos = array();
$cantidades = array();
while($row_detalle = mysql_fetch_array($query_detalle)){
	$dificultades[] = $row_detalle[0];
	$contenidos[] 	= $row_detalle[1];
	$cantidades[] 	= $row_detalle[2];
}
$join_level = join(",",$dificultades);
$join_content = join(",",$contenidos);
$sum_cant = array_sum($cantidades);

$query_preguntas = mysql_query("SELECT Pregunta.idPregunta, Pregunta.pregunta
								FROM pregunta Pregunta
								WHERE Pregunta.dificultad_iddificultad IN(".$join_level.")
								    AND Pregunta.contenido_idcontenido IN(".$join_content.")
								ORDER BY RAND()
								LIMIT ".$sum_cant."
								")or die(mysql_error());
	
	while($row_pregunta = mysql_fetch_array($query_preguntas)){
			$preguntas['id'][] = $row_pregunta[0];
			$preguntas['pregunta'][] = $row_pregunta[1];
			$preguntas['alternativas'][] = getAlternatives($row_pregunta[0]);
	}								
								
	echo "<pre>"; print_r($preguntas); echo "</pre>";
								
								