<?php
require("../conexion.php");

$cn = conectar();

if($_SERVER['REQUEST_METHOD']=='POST'){
	if(!empty($_POST)){
		
	@$nivel = $_POST['nivel'];
	@$letra = $_POST['letra'];
	@$learning = $_POST['type-learning'];
	@$generacion = $_POST['generacion'];
	
	$query = mysql_query("INSERT INTO curso( idcurso, 
												 nivel_curso, 
												 letra_curso,
												 generacion,
												 nivel_ens
												 )
					 VALUES('', '$nivel' , '".utf8_encode($letra)."', '$generacion' , 	'".utf8_encode($learning)."' )")or die(mysql_error());
	
		echo json_encode(array("status"=>"ok"));
	}else{
		echo json_encode(array("status"=>"error"));
	}
}

?>