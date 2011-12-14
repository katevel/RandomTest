<?php
session_start(); 
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
							WHERE Has.profesor_idprofesor = ".$_SESSION['user_id']."
							    AND Has.asignatura_idasignatura = Asignatura.idasignatura
							ORDER BY Asignatura.nombre_asignatura ASC")or die(mysql_error());


?>
<script type="text/javascript">
$(document).ready(function(){
	$(".emb-chck").click(function(e){
		var data = $(this).attr("data-id");
		switch(data){
		case(1):
			$(".chck-2").attr("disabled","disabled");
			$(".chck-3").attr("disabled","disabled");
			$(".chck-4").attr("disabled","disabled");
		break;
		case(2):
			$(".chck-1").attr("disabled","disabled");
			$(".chck-3").attr("disabled","disabled");
			$(".chck-4").attr("disabled","disabled");
		break;
		case(3):
			$(".chck-1").attr("disabled","disabled");
			$(".chck-2").attr("disabled","disabled");
			$(".chck-4").attr("disabled","disabled");
		break;
		case(4):
			$(".chck-1").attr("disabled","disabled");
			$(".chck-2").attr("disabled","disabled");
			$(".chck-3").attr("disabled","disabled");
		break;	
		}
	});
	$("#asignatura").change(function(e){
		var asign = $(this).val();
		$.ajax({
			url:"contenido.php?asign="+asign,
			dataType:"html", type:"post",
			success: function(data){
				$("#contenido").html(data);
			}
		})
	});
	
	var options_form1 = { // esta es la variable para ajax form para el primer formulario
        success:       responseForm,  // la funcion que hace despues de guardar o recibir confirmacion de envio
 	    url:       './agrega_pregunta.php',     //la ruta hacia donde van los datos
        type:      'post',        // el metodo de envio comun es post
        dataType:  'json'        // el tipo de dato que quieres recibir de donde enviaste los datos puede ser html, json, xml
    };
    var options_form2 = {
    	success: responseForm2,
    	url: 	'./agrega_pregunta.php',
    	type: 	'post',
    	dataType: 'json'
    }
    function responseForm(J){
		if(J.status=='ok'){
			$("#form").addClass("hide");
			$("#form2").removeClass("hide");
			$("#cant-ing").val(J.cant);
			$("#asign-ing").val(J.asign);
			$("#form2").find(".countdown").text("Preguntas restantes: "+J.cant);
		}
	}
	function responseForm2(J){
		if(J.status == 'ok'){
			var cant = $("#cant-ing").val();
			cant = parseInt(cant);
			cant = cant-1;
			if(cant>0){
				$("#form2").reset();
				$("#cant-ing").val("");
				$("#cant-ing").val(cant);
				$("#form2").find(".countdown").text("Preguntas restantes: "+cant);
			}else{
				$.ajax({
					url:"mis_pruebas.php",
					success: function(data){
						$("#content-system").html(data); 
					}
				});
			}
		}
	}
  	$('#form').ajaxForm(options_form1);
  	$("#form2").ajaxForm(options_form2);	
});
</script>
<form class="form-style" id="form" >
<input type="hidden" id="type" name="type" value="PRESAVE" />
<h2>Agregar Pregunta</h2>
<ul>
    <li class="first">
        <h3>Nombre Asignatura</h3>
        <p>
        	<select id="asignatura" name="asignatura">
        		<option value="0">Seleccione</option>
        		<?php
        		while($row = mysql_fetch_array($asignaturas)){
        			echo "<option value='".$row[0]."'>".$row[1]."</option>";
        		}
        		?>
        	</select>
        </p>
    </li>
    <li>
    	<h3>Cantidad de preguntas</h3>
    	<p>
    		<input type="text" id="cant-preguntas" name="cant-preguntas">
    	</p>
    </li>
    <li class="last">
        <input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
</ul>
</form>
<form id="form2" class="form-style hide">
	<input type="hidden" name="id-docente" value="<?=$_SESSION['user_id']?>" />
	<input type="hidden" name="cant-ing" id="cant-ing" value="" />
	<input type="hidden" name="asign-ing" id="asign-ing" value="" />
	<ul>
	<h2 class="countdown"></h2>
	<li class="first">
        <h3>Pregunta</h3>
        <p>
        	<textarea id="pregunta" name="pregunta" rows="5" cols="2"></textarea>
        </p>
    </li>
    <li>
        <h3>Contenido</h3>
        <p>
    	<select id="contenido" name="id_contenido">
    		<option value="0">Seleccione</option>
    	</select>
        </p>
    </li>
    <li>
        <h3>Dificultad</h3>
        <p>
    	<select id="id_dificultad" name="id_dificultad">
    		<option value="0">Seleccione</option>
    		<?php
			while($row = mysql_fetch_array($qdificultad)){
				echo "<option value='".$row[0]."'>".$row[1]."</option>";
			}
			?>
    	</select>
        </p>
    </li>
    <li>
    	<h3>Alternativa 1</h3>
    	<p> 
    		<textarea id="alternativa1" name="alternativa[1][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[1][check]" class="emb-chck chck-1" data-id="1"/>
    	</p>
    </li>
    <li>
    	<h3>Alternativa 2</h3>
    	<p>
    		<textarea id="alternativa2" name="alternativa[2][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[2][check]" class="emb-chck chck-2" data-id="2"/>
    	</p>
    </li>
    <li>
    	<h3>Alternativa 3</h3>
    	<p>
    		<textarea id="alternativa3" name="alternativa[3][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[3][check]" class="emb-chck chck-3" data-id="3"/>
    	</p>
    </li>
    <li>
    	<h3>Alternativa 4</h3>
    	<p>
    		<textarea id="alternativa4" name="alternativa[4][alternativa]" rows="2" cols="2"></textarea>
    		<label class="emb">Correcta</label><input type="checkbox" name="alternativa[4][check]" class="emb-chck chck-4" data-id="4"/>
    	</p>
    </li>
    <li class="last">
    	<input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
    </ul>
</form> 