<?
require("../conexion.php");
$cn = conectar();
if(!empty($_GET['asign'])){

$asign = $_GET['asign'];
$count = $_GET['count'];
$dificultad = mysql_query("SELECT 
							Dificultad.iddificultad, Dificultad.descripcion_dificultad  
							FROM dificultad AS Dificultad")or die(mysql_error());
							
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
							

?>
<tr>
	<td>
		<input type="text" name="pregunta[<?=$count?>][cantidad]"/>
	</td>
	<td>
		<select name="pregunta[<?=$count?>][dificultad]">
		<option value="0">Selecciona</option>
		<? 
		while($row = mysql_fetch_array($dificultad)){
			echo "<option value='".$row[0]."'>".$row[1]."</option>";
		}
		?>			
		</select>
	</td>
	<td>
		<select name="pregunta[<?=$count?>][contenido]">
			<option value="0">Selecciona</option>
		<?
		while($row2 = mysql_fetch_array($sql)){
			echo "<option value='".$row2[0]."'>".$row2[1]."</option>";
		}
		?>
		</select>
	</td>
</tr>
<?}?>