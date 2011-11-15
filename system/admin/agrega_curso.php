<?php
require("../conexion.php");

$cn = conectar();

if($_SERVER['REQUEST_METHOD']=='POST'){
				 
@$nivel = $_POST['nivel'];
@$letra = $_POST['letra'];
@$enseñanza = $_POST['enseñanza'];
@$generacion = $_POST['generacion'];



if(!empty($nivel)){
	
	$query = mysql_query("INSERT INTO curso( idcurso, 
												 nivel_curso, 
												 letra_curso,
												 generacion,
												 nivel_ens
												 )
					 VALUES('', '$nivel' , '".utf8_encode($letra)."', '$generacion' , 	'".utf8_encode($enseñanza)."' )")or die(mysql_error());
	
}else{
	echo "error";
	}
}
	echo "<script>alert(\"OK\");</script>";
	echo "<script language=javascript>location.href=\"\";</script>";
	

?>