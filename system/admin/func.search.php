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

$query2 = mysql_query("SELECT MAX(idcurso) FROM curso")or die(mysql_error());
while($row2 = mysql_fetch_array($query2)){
		$idcurso= $row2['0'];
	}

mysql_query("INSERT INTO alumno_has_curso (alumno_idalumno, curso_idcurso) VALUE ('$term', '$idcurso')")or die(mysql_error());
			
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

if($_GET['type']=='search2'){
$term2 = $_GET['term2'];

$query = mysql_query("SELECT 
					  idasignatura,
					  nombre_asignatura,
					  descripcion_asignatura
					FROM
					  asignatura
					WHERE nombre_asignatura = '".$term2."' 
					ORDER BY nombre_asignatura ")or die(mysql_error());
					
	while($row = mysql_fetch_assoc($query)){
		$idasignatura= $row['idasignatura'];
		$query2= mysql_query("SELECT idprofesor, 
									rut_profesor, 
									nombre_profesor 
							 FROM profesor INNER JOIN profesor_has_asignatura ON
							 idprofesor = profesor_idprofesor INNER JOIN asignatura ON
							 asignatura_idasignatura = idasignatura WHERE idasignatura = '".$idasginatura."' ")or die(mysql_error());
		while($row2 = mysql_fetch_assoc($query2)){
			$nombreprofe= $row2['nombre_profesor']." ". $row2['apePat_profesor'];
		}
	   echo "<tr>
			<td>".$row['nombre_asignatura']."</td>
			<td>$nombreprofe</td>
			<td><a href='Javascript: void(0);' onclick='Javascript: agregar(".$row['idasignatura'].");'>Agregar</a></td>
		 </td>";
	}
}elseif($_GET['type']=='embed2'){
$term = $_GET['term2'];

$query2 = mysql_query("SELECT MAX(idcurso) FROM curso")or die(mysql_error());
while($row2 = mysql_fetch_array($query2)){
		$idcurso= $row2['0'];
	}

mysql_query("INSERT INTO nivel (id_nivel, curso_idcurso, asignatura_idasignatura, nivel ) VALUE ('', '$idcurso', '$term2', )")or die(mysql_error());
			
$query = mysql_query("SELECT 
					  idasignatura,
					  nombre_asignatura,
					FROM
					  asignatura
					WHERE idasignatura = '".$term2."' 
					ORDER BY nombre_asignatura")or die(mysql_error());

	while($row = mysql_fetch_assoc($query)){
		$idprofe= $row['idasginatura'];
		$query2= mysql_query("SELECT idprofesor, 
									rut_profesor, 
									nombre_profesor 
							 FROM profesor INNER JOIN profesor_has_asignatura ON
							 idprofesor = profesor_idprofesor INNER JOIN asignatura ON
							 asignatura_idasignatura = idasignatura WHERE idasignatura= '".$idasginatura."' ")or die(mysql_error());
		while($row2 = mysql_fetch_assoc($query2)){
			$nombreprofe= $row2['nombre_profesor']." ". $row2['apePat_profesor'];
		}
	   echo "<tr>
			<td>".$row['nombre_asignatura']."</td>
			<td>$nombreprofe</td>
			<td><a href='Javascript: void(0);' onclick='Javascript: agregar(".$row['idasignatura'].");'>Agregar</a></td>
		 </td>";
		 

	}
		
}
?>
