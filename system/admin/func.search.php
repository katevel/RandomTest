<?php
require("../conexion.php");
$cn = conectar();

if($_GET['type']=='search'){
$term = $_GET['term'];
$curso = $_GET['course'];
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
			<td><a href='Javascript: void(0);' onclick='Javascript: agregar(".$row['idalumno'].",".$curso.");'>Agregar</a></td>
		 </td>";
	}
}elseif($_GET['type']=='embed'){
$term = $_GET['term'];
$curso = $_GET['course']; //se envia por ajax :p
/*$query2 = mysql_query("SELECT MAX(idcurso) FROM curso")or die(mysql_error());
while($row2 = mysql_fetch_array($query2)){
		$idcurso= $row2['0'];
	}*/

mysql_query("INSERT INTO alumno_has_curso (alumno_idalumno, curso_idcurso) VALUE ('$term', '$curso')")or die(mysql_error());
			
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

if($_GET['type']=='search2'){//guardar asignatura
$term2 = $_GET['term2'];
$curso = $_GET['course'];
$query = mysql_query("SELECT 
					  idasignatura,
					  nombre_asignatura,
					  descripcion_asignatura
					FROM
					  asignatura
					WHERE nombre_asignatura = '".$term2."' 
					ORDER BY nombre_asignatura ")or die(mysql_error());
					
	while($row = mysql_fetch_assoc($query)){
		@$idasignatura= $row['idasignatura'];
		$nombre_asignatura = $row['nombre_asignatura'];
	}
	
if($idasignatura!=''){
		$query2= mysql_query("SELECT idprofesor, 
									rut_profesor, 
									nombre_profesor,
									apePat_profesor 
							 FROM profesor INNER JOIN profesor_has_asignatura ON
							 idprofesor = profesor_idprofesor INNER JOIN asignatura ON
							 asignatura_idasignatura = idasignatura WHERE idasignatura = '".@$idasignatura."' ")or die(mysql_error());
		while($row2 = mysql_fetch_assoc($query2)){
			$nombreprofe= $row2['nombre_profesor']." ". $row2['apePat_profesor'];
		}
	   echo "<tr>
			<td>".$nombre_asignatura."</td>
			<td>".$nombreprofe."</td>
			<td><a href='Javascript: void(0);' onclick='Javascript: agregar(".$idasignatura.",".$curso.");'>Agregar</a></td>
		 </td>";
}else{
	echo "ERROR";
}
	
}elseif($_GET['type']=='embed2'){//embutir asignaturas
$term2 = @$_GET['term2'];//7
$curso = @$_GET['course'];//6

// ya teniamos el id del curso era mejor consultar por el nivel del id de ese curso =D 
$query2 = mysql_query("SELECT nivel_ens FROM curso WHERE idcurso = ".$curso." ")or die(mysql_error());
while($row2 = mysql_fetch_array($query2)){
		$nivel_ens= $row2['0'];
}

mysql_query("INSERT INTO nivel (curso_idcurso, asignatura_idasignatura, nivel ) VALUE (".$curso.",".$term2.",".$nivel_ens." )")or die(mysql_error());
			
$query = mysql_query("SELECT 
					  idasignatura,
					  nombre_asignatura
					FROM
					  asignatura
					WHERE idasignatura = '".$term2."' 
					ORDER BY nombre_asignatura")or die(mysql_error());

	while($row = mysql_fetch_assoc($query)){
		@$idprofe= @$row['idasginatura'];
		$query2= mysql_query("SELECT idprofesor, 
									rut_profesor, 
									nombre_profesor 
							 FROM profesor INNER JOIN profesor_has_asignatura ON
							 idprofesor = profesor_idprofesor INNER JOIN asignatura ON
							 asignatura_idasignatura = idasignatura WHERE idasignatura= '".@$idasginatura."' ")or die(mysql_error());
		while($row2 = mysql_fetch_assoc($query2)){
			$nombreprofe= $row2['nombre_profesor']." ". $row2['apePat_profesor'];
		}
	   echo "<tr>
			<td>".$row['nombre_asignatura']."</td>
			<td>".@$nombreprofe."</td>
			<td><a href='Javascript: void(0);' onclick='Javascript: agregar(".$row['idasignatura'].");'>Agregar</a></td>
		 </td>";
		 

	}
		
}
if($_GET['type']=='content'){
	$term = $_GET['term'];
	$desc = $_GET['desc'];
	$asign = $_GET['asign'];
	
	mysql_query("INSERT INTO contenido (
				  nombre_contenido,
				  descripcion_contenido,
				  asignatura_idasignatura
				) 
				VALUES
				  ('".$term."','".$desc."','".$asign."')") or die(mysql_error());
	$result = mysql_query("SELECT idcontenido 
							FROM contenido 
							WHERE nombre_contenido = '".$term."' 
							AND asignatura_idasignatura = ".$asign." LIMIT 1")or die(mysql_error());
							
	while($row = mysql_fetch_array($result)){
		$id = $row[0];
	}
	echo json_encode(array("status"=>"ok","id"=>$id,"title"=>$term,"desc"=>$desc));
	echo "<tr>
			<td>".$id."</td>
			<td>".$term."</td>
			<td>".$term."</td>
			<tr>";
}
?>
