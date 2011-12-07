<?php

require("../conexion.php");
$cn = conectar();

$qdificultad = mysql_query("SELECT 
							  dificultad.iddificultad,
							  dificultad.descripcion_dificultad 
							FROM
							  dificultad 
							ORDER BY dificultad.iddificultad ") or die (mysql_error());
$asignaturas = mysql_query("SELECT
							  Asignatura.idasignatura,
							  Asignatura.nombre_asignatura
							FROM profesor_has_asignatura Has,
							  asignatura Asignatura
							WHERE Has.profesor_idprofesor = 1
							    AND Has.asignatura_idasignatura = Asignatura.idasignatura
							ORDER BY Asignatura.nombre_asignatura ASC")or die(mysql_error());


?>
<script type="text/javascript">
$(document).ready(function(){
	var options_form1 = { // esta es la variable para ajax form para el primer formulario
        success:       responseFrom1,  // la funcion que hace despues de guardar o recibir confirmacion de envio
 	    url:       './agrega_pregunta.php',     //la ruta hacia donde van los datos
        type:      'post',        // el metodo de envio comun es post
        dataType:  'json'        // el tipo de dato que quieres recibir de donde enviaste los datos puede ser html, json, xml
    };
    function responseFrom1(J){
		if(J.status=='ok'){
			
		}
	}
  	$('#form').ajaxForm(options_form1);	
});
</script>
<form class="form-style" id="form" method="post" action="agrega_pregunta.php">
<input type="hidden" name="id-docente" value="<?=$_SESSION['user_id']?>" />
<h2>Agregar Pregunta</h2>
<ul>
    <li class="first">
        <h3>Nombre Asignatura</h3>
        <p>
        	<select id="asignatura" name="asignatura">
        		<?php
        		while($row = mysql_fetch_array($asignaturas)){
        			echo "<option value='".$row[0]."'>".$row[1]."</option>";
        		}
        		?>
        	</select>
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
    <li>
    	<h3>Alternativa 1</h3>
    	<p> 
    		<textarea id="alternativa1" name="alternativa[1][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[1][check]" class="emb-chck" data-id="1"/>
    	</p>
    </li>
    <li>
    	<h3>Alternativa 2</h3>
    	<p>
    		<textarea id="alternativa2" name="alternativa[2][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[2][check]" class="emb-chck" data-id="2"/>
    	</p>
    </li>
    <li>
    	<h3>Alternativa 3</h3>
    	<p>
    		<textarea id="alternativa3" name="alternativa[3][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[3][check]" class="emb-chck" data-id="3"/>
    	</p>
    </li>
    <li>
    	<h3>Alternativa 4</h3>
    	<p>
    		<textarea id="alternativa4" name="alternativa[4][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[4][check]" class="emb-chck" data-id="4"/>
    	</p>
    </li>
    <li class="last">
        <input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
</ul>
</form> 