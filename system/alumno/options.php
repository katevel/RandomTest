<?php
require("../conexion.php");
$cn = conectar();

function getAlternatives($question_id){
	$query = mysql_query("SELECT
						  Alternativa.idalternativas,
						  Alternativa.alternativa
						FROM alternativas Alternativa
						WHERE Alternativa.pregunta_idPregunta = ".$question_id."
						ORDER BY RAND()")or die(mysql_error());
	$result = array();

	while($row = mysql_fetch_array($query)){
		$result[] = $row[1];
	}
	
	return $result; 
}

