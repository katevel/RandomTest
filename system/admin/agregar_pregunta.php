<?php

require("../conexion.php");
$cn = conectar();

$qdificultad = mysql_query("SELECT 
							  dificultad.iddificultad,
							  dificultad.descripcion_dificultad 
							FROM
							  dificultad 
							ORDER BY dificultad.iddificultad ") or die (mysql_error());


?>
<form class="form-style" id="form" method="post" action="agrega_asignatura.php">
<h2>Agregar Pregunta</h2>
<ul>
    <li class="first">
        <h3>Nombre Asignatura</h3>
        <p>
        	<input type="text" id="nombre" name="nombre" />
        </p>
    </li>
    <li>
        <h3>Pregunta</h3>
        <p>
        	<textarea id="pregunta" name="pregunta" rows="5" cols="2"></textarea>
        </p>
    </li>
    <li>
        <h3>Dificultad</h3>
        <p>
    	<select id="id_dificultad" name="id_dificultad">
    		<?php
			while($row = mysql_fetch_array($qdificultad)){
				echo "<option value='".$row[0]."'>".$row[1]."</option>";
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