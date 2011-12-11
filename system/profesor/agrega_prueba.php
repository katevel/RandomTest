<?php
require("../conexion.php");
include("global.php");
$cn = conectar();

/*if($_POST['type']=='FIRST'){
		echo json_encode(array("status"=>"ok","asignatura"=>$_POST['asignatura'],"curso"=>$_POST['curso']));	
}else{
	if($_POST['type']=='AFTER'){
		
		$preguntas = $_POST['pregunta'];		
		$asign = $_POST['asignatura'];
		
		$qasing = mysql_query("SELECT nombre_asignatura FROM asignatura WHERE idasignatura = ".$asign." ")or die(mysql_error());
		while($row_asign = mysql_fetch_array($qasing)){
			$nombre_asignatura = $row_asign[0];
		}
		$cantidad_grupos =  count($preguntas);
		
		if($cantidad_grupos == 3){
			$limit = ((int)$preguntas[0]['cantidad'])+((int)$preguntas[1]['cantidad'])+((int)$preguntas[2]['cantidad']);*/
			$query = mysql_query("(
								SELECT
								  Pregunta.idPregunta, Pregunta.pregunta
								FROM pregunta Pregunta
								WHERE Pregunta.contenido_idcontenido = 2
								AND Pregunta.dificultad_iddificultad = 1
								)UNION(
								SELECT
								  Pregunta.idPregunta, Pregunta.pregunta
								FROM pregunta Pregunta
								WHERE Pregunta.contenido_idcontenido = 3
								AND Pregunta.dificultad_iddificultad = 2
								)UNION(
								SELECT
								  Pregunta.idPregunta, Pregunta.pregunta
								FROM pregunta Pregunta
								WHERE Pregunta.contenido_idcontenido = 10
								AND Pregunta.dificultad_iddificultad = 2)
								ORDER BY RAND()
								LIMIT 3 ")or die(mysql_error());
								
								
			$nombre_asignatura = "LENGUAJE";
			$resultado = array();
			include("../lib/class.ezpdf.php");
			$pdf = new Cezpdf('a4');
			$datacreator = array (
			                    'Title'=>'Ejemplo PDF',
			                    'Author'=>'',
			                    'Subject'=>'',
			                    'Creator'=>'',
			                    'Producer'=>''
			                    );
								
			$pdf->addInfo($datacreator);
			$pdf->ezText("<b>Prueba de ".$nombre_asignatura."</b><br />",20);
			$pdf->ezText("Nombre Alumno: ........................................ Fecha:...... Curso: .....<br />",20);
			$pdf->ezText("\n\n\n",20);
			$i = 1;
			while($row = mysql_fetch_array($query)){
				$alternativas = getAlternatives($row[0]);
				$pdf->ezText("".$i." - ".$row[1]."\n",12);
				$pdf->ezText("\n\n\n",10);
				foreach($alternativas['alternativa'] as $a => $alternativa){
				$pdf->ezText("-".$alternativa,10);	
				}
			$i++;
			}				
			$pdf->ezStream();
	
/*		}
	}
}	*/
?>
