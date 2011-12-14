<?php
session_start();
require("../conexion.php");
$cn = conectar();	
$q_asign = mysql_query("SELECT
						Asignatura.nombre_asignatura
						FROM profesor_has_asignatura AS Has,
						asignatura Asignatura
						WHERE Has.profesor_idprofesor = ".@$_SESSION['user_id']."
						AND Asignatura.idasignatura = Has.asignatura_idasignatura");	
							
$q_count = mysql_query("SELECT
						  COUNT(*)AS count
						FROM pregunta
						WHERE profesor_idprofesor = ".@$_SESSION['user_id']." ");							
							
while($asg = mysql_fetch_array($q_asign)){
	$asignaturas[] = $asg[0];
}	
while($row = mysql_fetch_array($q_count)){
	$count = $row[0];
}		
?>
<div class="form-style">
	<h3>Tus Asignaturas</h3>
	<ul><? 
		for ($i=0; $i<=count($asignaturas)-1; $i++){?>
			<li><?=$asignaturas[$i]?> <img src="../../img/tick.png"</li>
		<?}?>
	</ul>
</div>
<div class="form-style">
	<h3>Cantidad de preguntas Ingresadas</h3>
	<ul>
		<li><?=$count?></li>
	</ul>
</div>