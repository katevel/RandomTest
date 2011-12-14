<?php
require("../conexion.php");
$cn = conectar();
$query = mysql_query("SELECT
					  Curso.nivel_ens,
					  Curso.letra_curso,
					  Curso.generacion,
					  Curso.nivel_ens
					FROM curso Curso
					ORDER BY Curso.generacion DESC");
$qcount_profe = mysql_query("SELECT COUNT(*) FROM profesor WHERE estado_profesor = 'ACTIVO'");
$qcount_alumn = mysql_query("SELECT COUNT(*) FROM alumno WHERE estado = 'ACTIVO'");					
					
while($row = mysql_fetch_assoc($query)){
	$cursos[] = $row;
}
while($rowp = mysql_fetch_array($qcount_profe)){
	$cantidad_profe = $rowp[0];
}	
while($rowa = mysql_fetch_array($qcount_alumn)){
	$cantidad_alumnos = $rowa[0];
}						
?>
<div class="form-style">
	<h2>Cursos Ingresados</h2>
<ul>
<? foreach($cursos as $curso){?>
	<li><?=$curso['nivel_ens']." ".$curso['letra_curso']."  /  Generacion:".$curso['generacion']?><?=($curso['tipo_ens']==1)?'  /  Enseñanza Basica':'  /  Enseñanza Media';?></li>
<?} ?>
</ul>
</div>
<div class="form-style">
	<h2>Cantidad Profesores</h2>
	<ul>
		<li><?=$cantidad_profe." profesores"?></li>
	</ul>
</div>
<div class="form-style">
	<h2>Cantidad Alumnos</h2>
	<ul>
		<li><?=$cantidad_alumnos." alumnos"?></li>
	</ul>
</div>