<?php
require("../conexion.php");
$cn = conectar();

/*echo "<pre>".print_r($_POST)."</pre>";
die();*/
if(@$_SERVER['REQUEST_METHOD']=='POST'){
	if(@$_POST['type']=='PRESAVE'){
		echo json_encode(array("status"=>"ok","asign"=>@$_POST['asignatura'],"cant"=>@$_POST['cant-preguntas']));
	}else{
		//guarda en la tabla pregunta
		$docente 		= @$_POST['id-docente'];
		$asignatura 	= @$_POST['asign-ing'];
		$pregunta 		= @$_POST['pregunta'];
		$dificultad 	= @$_POST['id_dificultad'];
		$contenido 		= @$_POST['id_contenido'];
		$alternativas 	= @$_POST['alternativa'];
		
		//guarda la pregunta 
		mysql_query("INSERT INTO pregunta 
					(pregunta, profesor_idprofesor, dificultad_iddificultad, contenido_idcontenido) 
					VALUES('".$pregunta."',".$docente.",".$dificultad.",".$contenido.")")or die(mysql_error());
		
		//id de la ultima pregunta ingresada por el docente			
		$query = mysql_query("SELECT idPregunta FROM pregunta WHERE profesor_idprofesor = ".$docente." ORDER BY idPregunta DESC LIMIT 1");
			
		while($row = mysql_fetch_array($query)){
			$idPregunta = $row[0];
		}
		// ciclo para guardar las alternativas de la pregunta
		for( $i=1 ; $i<=4 ; $i++ ){
			(!empty($alternativas[$i]['check']))?$type = 'CORRECTA': $type = 'OPCION';
			mysql_query("INSERT INTO 
						alternativas (alternativa, pregunta_idPregunta, tipo) 
						VALUES('".$alternativas[$i]['alternativa']."',".$idPregunta.",'".$type."')");
		}
		echo json_encode(array("status"=>"ok"));
	
	}	
}
?>