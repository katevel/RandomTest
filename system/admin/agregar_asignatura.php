<?php
require("../conexion.php");

$cn = conectar();
?>
<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>


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
<form class="" id="form" method="post" action="agrega_asignatura.php">
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
        	<input type="text" id="descripcion" name="descripcion"  />
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