<?php
require("../conexion.php");
$cn = conectar();

if($_GET['type']=='search'){
$term = $_GET['term'];

$query = mysql_query("SELECT 
					  idalumno,
					  rut_alumno,
					  nombre_alumno,
					  apePat_alumno,
					  apePat_alumno 
					FROM
					  alumno
					WHERE rut_alumno = '".$term."' 
					ORDER BY nombre_alumno ")or die(mysql_error());
					
	while($row = mysql_fetch_assoc($query)){
	   echo "<tr>
			<td>".$row['nombre_alumno']."</td>
			<td>".$row['apePat_alumno']."</td>
			<td>".$row['rut_alumno']."</td>
			<td><a href='Javascript: void(0);' onclick='Javascript: agregar(".$row['idalumno'].");'>Agregar</a></td>
		 </td>";
	}
}elseif($_GET['type']=='embed'){
$term = $_GET['term'];
$query = mysql_query("SELECT 
					  idalumno,
					  rut_alumno,
					  nombre_alumno,
					  apePat_alumno,
					  apePat_alumno 
					FROM
					  alumno
					WHERE idalumno = '".$term."' 
					ORDER BY nombre_alumno")or die(mysql_error());

	while($row = mysql_fetch_assoc($query)){
		echo "<tr>
			<td>".$row['nombre_alumno']."</td>
			<td>".$row['apePat_alumno']."</td>
			<td>".$row['rut_alumno']."</td>
			<td><button type='button' class='opt-add added'></button></td>
		 </td>";
	}
	
}
?>
