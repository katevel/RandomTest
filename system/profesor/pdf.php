<?php
require("../conexion.php");
include("global.php");
$cn = conectar();

if($_POST['type']=='AFTER'){
		$preguntas = $_POST['pregunta'];		
		$asign = $_POST['asignatura'];
		
		$qasing = mysql_query("SELECT nombre_asignatura FROM asignatura WHERE idasignatura = ".$asign." ")or die(mysql_error());
		while($row_asign = mysql_fetch_array($qasing)){
			$nombre_asignatura = $row_asign[0];
		}
		$cantidad_grupos =  count($preguntas);
		
		if($cantidad_grupos == 3){
			for($i=0; $i<=count($preguntas)-1; $i++){
				$dificultad[] = $preguntas[$i]['dificultad'];
				$contenido[] = $preguntas[$i]['contenido'];
				$cantidad[] = $preguntas[$i]['cantidad'];
			}
			$join_level = join(",",$dificultad);
			$join_content = join(",",$contenido);
			$sum_limit = array_sum($cantidad);
			
			
			$limit = ((int)$preguntas[0]['cantidad'])+((int)$preguntas[1]['cantidad'])+((int)$preguntas[2]['cantidad']);
			
			$query = mysql_query("SELECT Pregunta.idPregunta, Pregunta.pregunta
									FROM pregunta Pregunta
									WHERE Pregunta.dificultad_iddificultad IN(".$join_level.")
									    AND Pregunta.contenido_idcontenido IN(".$join_content.")
									ORDER BY RAND()
									LIMIT ".$sum_limit."")or die(mysql_error());
								
								
			
			$resultado = array();
			
			while($row_pregunta = mysql_fetch_array($query)){
				$preguntas['id'][] = $row_pregunta[0];
				$preguntas['pregunta'][] = $row_pregunta[1];
				$preguntas['alternativas'][] = getAlternatives($row_pregunta[0]);
			}	
			include('../lib/class.ezpdf.php');
			$pdf = new Cezpdf('a4');
			$pdf->selectFont('../lib/fonts/Helvetica.afm');
			$datacreator = array (
			                    'Title'=>'Ejemplo PDF',
			                    'Author'=>'',
			                    'Subject'=>'',
			                    'Creator'=>'',
			                    'Producer'=>''
			                    );
			$pdf->addInfo($datacreator);
			$pdf->ezText("<b>Prueba de ".$nombre_asignatura."\n</b>",20);
			$pdf->ezText("\n\nNombre Alumno: ........................................ Fecha:...... Curso: .....\n",12);
			$pdf->ezText("\n\n\n",5);
			$fuentes = array("A)","B)","C)","D)","E)","F)");
			$j = 1;
			foreach($preguntas['pregunta'] as $p => $pregunta){
				$pdf->ezText("".$j." - ".$pregunta,12, array("justification"=>"left","right"));
				$i=0;
				foreach($preguntas['alternativas'][$p] as $a => $alternativa){
					$pdf->ezText($fuentes[$i]." ".$alternativa,10);						
				$i++;
				}
				$j++;
				$pdf->ezText("\n\n\n",5);
			}
			$pdf->ezStream();
	
		}
	}

?>