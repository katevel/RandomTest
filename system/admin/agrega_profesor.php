<?php
require("../conexion.php");

$cn = conectar();

if($_SERVER['REQUEST_METHOD']=='POST'){
				 
@$rut = $_POST['rut'];
@$nombre = $_POST['nombre'];
@$apePat = $_POST['apePat'];
@$apeMat = $_POST['apeMat'];
@$direccion = $_POST['direccion'];
@$telefono = $_POST['telefono'];
@$pass = $_POST['pass'];

	if(!empty($rut)){
		$exp = explode("/",$_POST['fecha_nac']);
		$fechaNac = $exp[2]."-".$exp[1]."-".$exp[0];
		$query = mysql_query("INSERT INTO profesor ( idprofesor,
													rut_profesor, 
													 nombre_profesor, 
													 apePat_profesor, 
													 apeMat_profesor, 
													 fnac_profesor, 
													 direccion_profesor, 
													 telefono_profesor,
													 password_profesor
													 ) 
							 VALUES('', '".utf8_encode($rut)."','".utf8_encode($nombre)."', '".utf8_encode($apePat)."','".utf8_encode($apeMat)."', '".utf8_encode($fechaNac)."', '".utf8_encode($direccion)."','$telefono', '".utf8_encode($pass)."' )")or die(mysql_error());
		echo json_encode(array("status"=>"ok"));
		
	}else{
		echo json_encode(array("status"=>"error"));
	}
}
	
	

?>