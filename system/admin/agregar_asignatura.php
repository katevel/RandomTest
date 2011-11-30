<?php
require("../conexion.php");

$cn = conectar();
?>
<script>
  $(document).ready(function(){
    $("#form").validate({
    	rules: {
			nombre:{
    			required: true,
    			maxlength: 45
    		},
    		descripcion:{
    			required: true,
    			maxlength: 45
    		}
    		}
    });		
  });
</script>
 <?php
$query1 = mysql_query("select idprofesor, nombre_profesor, apePat_profesor from profesor order by idprofesor asc ")or die(mysql_error());

?>
<form class="form-style" id="form" method="post" action="agrega_asignatura.php">
<h2>Agregar Asignatura</h2>
<ul>
    <li class="first">
        <h3>Nombre Asignatura</h3>
        <p>
        	<input type="text" id="nombre" name="nombre" />
        </p>
    </li>
    <li>
        <h3>Descripcion</h3>
        <p>
        	<textarea id="descripcion" name="descripcion" rows="5" cols="2"></textarea>
        </p>
    </li>
    <li>
        <h3>Profesor</h3>
        <p>
    	<select id="idprofe" name="idprofe">
    		<?php
			while($row = mysql_fetch_array($query1)){
				echo "<option value='".$row[0]."'>".$row[1]." ".$row[2]."</option>";
			}
			?>
    	</select> <br />
        </p>
    </li>
    
    <li class="last">
        <input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
</ul>
</form> 