<?php
require("../conexion.php");

$cn = conectar();

if($_SERVER['REQUEST_METHOD']=='POST'){
				 
@$rut = $_POST['rut'];
@$nombre = $_POST['nombre'];
@$apePat = $_POST['apePat'];
@$apeMat = $_POST['apeMat'];
@$fechaNac = $_POST['fecha_nac'];
@$direccion = $_POST['direccion'];
@$telefono = $_POST['telefono'];
@$pass = $_POST['pass'];

if(!empty($rut)){
	
	$query = mysql_query("INSERT INTO alumno ( idalumno	,
												rut_alumno, 
												 nombre_alumno, 
												 apePat_alumno, 
												 apeMat_alumno, 
												 fnac_alumno, 
												 direccion_alumno, 
												 telefono_alumno,
												 password_alumno
												 ) 
						 VALUES('', '".utf8_encode($rut)."','".utf8_encode($nombre)."', '".utf8_encode($apePat)."','".utf8_encode($apeMat)."', '".utf8_encode($fechaNac)."', '".utf8_encode($direccion)."','$telefono', '".utf8_encode($pass)."' )")or die(mysql_error());
	
}else{
	echo "error";
	}
}
	echo "<script>alert(\"OK\");</script>";
	echo "<script language=javascript>location.href=\"\";</script>";
	

?>