<?php 
session_start();
require("../conexion.php");
$cn = conectar(); 
 
$query = mysql_query("SELECT
						  Prueba.idprueba,
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
