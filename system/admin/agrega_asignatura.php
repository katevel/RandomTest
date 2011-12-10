<?php
require("../conexion.php");

$cn = conectar();

if($_SERVER['REQUEST_METHOD']=='POST'){
				 
	@$nombre = $_POST['nombre'];
	@$descripcion = $_POST['descripcion'];
	@$idprofe = $_POST['idprofe'];
	
	
	if(!empty($nombre)){
		
		$query = mysql_query("INSERT INTO asignatura ( idasignatura	,
													   nombre_asignatura,
													   descripcion_asignatura
													 ) 
							 VALUES('', '".utf8_encode($nombre)."' , '".utf8_encode($descripcion)."' )")or die(mysql_error());
		
		$query2 = mysql_query("SELECT idasignatura FROM asignatura WHERE nombre_asignatura = '".utf8_encode($nombre)."' order by idasignatura desc limit 1")or die(mysql_error());
		
			while($row = mysql_fetch_assoc($query2)){
			@$idasignatura= $row['idasignatura'];
			$query3 = mysql_query("INSERT INTO profesor_has_asignatura ( 
																		profesor_idprofesor,
													   					asignatura_idasignatura
													 					) 
							 VALUES('$idprofe' , '$idasignatura' )")or die(mysql_error());
	
			}
		echo json_encode(array("status"=>"ok","asignatura"=>$idasignatura));
		
	}else{
		echo "error";
	}

}	
?>