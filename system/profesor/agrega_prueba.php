<?php
require("../conexion.php");
include("global.php");
$cn = conectar();

if($_POST['type']=='FIRST'){
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
			$limit = ((int)$preguntas[0]['cantidad'])+((int)$preguntas[1]['cantidad'])+((int)$preguntas[2]['cantidad']);
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
			include('../lib/class.ezpdf.php');
			$pdf = new Cezpdf('a4');
			$datacreator = array (
			                    'Title'=>'Ejemplo PDF',
			                    'Author'=>'',
			                    'Subject'=>'',
			                    'Creator'=>'',
			                    'Producer'=>''
			                    );
			$pdf->addInfo($datacreator);
			$pdf->ezText("<b>Prueba de ".$nombre_asignatura."</b>\n",20);
			$pdf->ezText("\n\n\n",10);
			$pdf->ezText("Nombre Alumno: ........................................ Fecha:...... Curso: .....\n",12);
			$pdf->ezText("\n\n\n",10);
			
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
			ob_end_clean();	
			$pdf->ezStream();
	
		}
	}
	if($_POST['type']=='ONLINE'){
		
		$curso = $_POST['curso'];
		$asign = $_POST['asignatura'];
		$preguntas = $_POST['pregunta'];
		$qasing = mysql_query("SELECT nombre_asignatura FROM asignatura WHERE idasignatura = ".$asign." ")or die(mysql_error());
		
		while($row_asign = mysql_fetch_array($qasing)){
			$nombre_asignatura = $row_asign[0];//buscar nombre asignatura
		}
		$qalumnos = mysql_query("SELECT
								  Alumno.idalumno
								FROM curso Curso,
								  alumno_has_curso Has,
								  alumno Alumno
								WHERE Curso.idcurso = Has.curso_idcurso
								    AND Has.alumno_idalumno = Alumno.idalumno
								    AND Curso.idcurso = ".$curso." ")or die(mysql_error());
		$alumnos = array();							
		while($ralum = mysql_fetch_array($qalumnos)){
			$alumnos[] = $ralum[0];//array con ids de alumnos
		}
		$join_alumnos = join(",",$alumnos);							
		for($i=0; $i<=count($alumnos)-1; $i++){
			mysql_query("INSERT INTO prueba
						            (nombre,
						             alumno_idalumno,
						             fechaHora_inicio,
						             fechaHora_termino)
							VALUES ('".$nombre_asignatura."',
							        ".$alumnos[$i].",
							        NOW(),
							        NOW())")or die(mysql_error());
		}
		$qprueba = mysql_query("SELECT prueba.idprueba FROM prueba WHERE alumno_idalumno IN (".$join_alumnos.")")or die(mysql_error());
		while($rpr = mysql_fetch_array($qprueba)){
			$ids_prueba[] = $rpr[0];
		}
		for($i = 0; $i <= count($ids_prueba)-1; $i++){
			for($j= 0; $j <= count($preguntas)-1; $j++){
				mysql_query("INSERT INTO detalle_prueba
							            (prueba_idprueba,
							             iddificultad,
							             idcontenido,
							             cantidad)
							VALUES (".$ids_prueba[$i].",
							        ".$preguntas[$j]['dificultad'].",
							        ".$preguntas[$j]['contenido'].",
							        ".$preguntas[$j]['cantidad'].");")or die(mysql_error());
			}
		}
		echo json_encode(array("status"=>"ok"));
	}
}	
?>
