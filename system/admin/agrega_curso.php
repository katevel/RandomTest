<?php
require("../conexion.php");

$cn = conectar();


if($_SERVER['REQUEST_METHOD']=='POST'){
	if(!empty($_POST)){
		

	@$letra = $_POST['letra'];
	@$learning = $_POST['type-learning'];
	@$generacion = $_POST['generacion'];
	
	$query = mysql_query("INSERT INTO curso( idcurso,
												 letra_curso,
												 generacion,
												 nivel_ens
												 )
					 VALUES('', '".utf8_encode($letra)."', '$generacion' , 	'".utf8_encode($learning)."' )")or die(mysql_error());
	
	$last = mysql_query("SELECT idcurso, nivel_ens FROM curso ORDER BY idcurso DESC LIMIT 1")or die(mysql_error());
	while($row = mysql_fetch_array($last)){
		$id_curso = $row[0];
		$n
	}
	
		echo json_encode(array("status"=>"ok","curso"=>$id_curso));
	}else{
		echo json_encode(array("status"=>"error", "curso"=>"nan"));
	}
}

?>