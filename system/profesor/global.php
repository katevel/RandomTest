<?php

function getAlternatives($prueba_id){
	if(!empty($prueba_id)){
		$query = mysql_query("SELECT
							  Altern.idalternativas,
							  Altern.alternativa,
							  Altern.tipo
							FROM alternativas Altern
							WHERE Altern.pregunta_idPregunta = ".$prueba_id." ")or die(mysql_error());
		$return = array();					
		while($row = mysql_fetch_array($query)){
			$return['id'][] = $row[0];
			$return['alternativa'][] = $row[1];
			$return['tipo'][] = $row[2];
		}					
		return $return;			
	}else{
		return false;
	}
	
}














