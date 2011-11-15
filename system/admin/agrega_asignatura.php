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
												 descripcion_asignatura, 
												 profesor_idprofesor
												 ) 
						 VALUES('', '".utf8_encode($nombre)."' , '".utf8_encode($descripcion)."', '$idprofe' )")or die(mysql_error());
	
}else{
	echo "error";
	}

}
	echo "<script>alert(\"OK\");</script>";
	echo "<script language=javascript>location.href=\"\";</script>";
	
	
?>