<?php

$term = $_GET['term'];

$query = mysql_query("SELECT 
					  Alumno.idalumno,
					  Alumno.rut_alumno,
					  Alumno.nombre_alumno,
					  Alumno.apePat_alumno,
					  Alumno.apePat_alumno 
					FROM
					  alumno Alumno 
					WHERE Alumno.rut_alumno = '".$term."' 
					ORDER BY Alumno.nombre_alumno ");
					
	$row = mysql_fetch_assoc($query);
	
	echo "<tr>
			<td>".$row['Alumno']['nombre_alumno']."</td>
			<td>".$row['Alumno']['apePat_alumno']."</td>
			<td>".$row['Alumno']['rut_alumno']."</td>
			<td><a href='Javascript: agregar('".$row['Alumno']['idalumno']."');'>Agregar</a></td>
		 </td>";

?>
