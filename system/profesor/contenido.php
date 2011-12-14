<?php
include("../conexion.php");
$cn = conectar();
$asign = @$_GET['asign'];

$nq = mysql_query("SELECT nivel FROM nivel WHERE asignatura_idasignatura = ".$asign." ")or die(mysql_error());
while($nm = mysql_fetch_array($nq)){
	$nivel  = $nm[0];
}

$sql = mysql_query("SELECT Content.idcontenido, Content.nombre_contenido
					FROM contenido Content,
					  asignatura Asign,
					  nivel Nivel
					WHERE Asign.idasignatura = Content.asignatura_idasignatura
					    AND Asign.idasignatura = ".$asign."
					    AND Nivel.asignatura_idasignatura = Asign.idasignatura
					    AND Nivel.nivel  = ".$nivel." ")or die (mysql_error());

    echo "<option value='0'>Selecciona</option>";
while($row = mysql_fetch_array($sql)){
	echo "<option value='".$row[0]."' >".$row[1]."</option>";
}
		

?>