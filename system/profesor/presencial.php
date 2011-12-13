<?php
require("../conexion.php");
$cn = conectar();
session_start();

$qasignaturas = mysql_query("SELECT
							  Asignatura.idasignatura,
							  Asignatura.nombre_asignatura
							FROM profesor_has_asignatura Has,
							  asignatura Asignatura
							WHERE Has.profesor_idprofesor = ".@$_SESSION['user_id']."
							    AND Has.asignatura_idasignatura = Asignatura.idasignatura
							ORDER BY Asignatura.nombre_asignatura ASC")or die(mysql_error());

$qcursos = mysql_query("SELECT curso.`idcurso`, curso.`letra_curso`, nivel.`nivel` FROM curso INNER JOIN nivel ON
					curso.`idcurso` = nivel.`curso_idcurso` INNER JOIN asignatura ON
					nivel.`asignatura_idasignatura`= asignatura.`idasignatura` INNER JOIN profesor_has_asignatura ON
					asignatura.`idasignatura`= profesor_has_asignatura.`asignatura_idasignatura` INNER JOIN profesor ON
					profesor_has_asignatura.`id_profe_asig`= profesor.`idprofesor` WHERE
					profesor.`idprofesor`= ".@$_SESSION['user_id']." ")or die(mysql_error());							

?>

<script type="text/javascript">
$(document).ready(function(){
	
	var options_form1 = { // esta es la variable para ajax form para el primer formulario
        success:       responseForm,  // la funcion que hace despues de guardar o recibir confirmacion de envio
 	    url:       'agrega_prueba.php',     //la ruta hacia donde van los datos
        type:      'post',        // el metodo de envio comun es post
        dataType:  'json'        // el tipo de dato que quieres recibir de donde enviaste los datos puede ser html, json, xml
    };
    var options_form2 = { // esta es la variable para ajax form para el primer formulario
        success:   responseForm2,  // la funcion que hace despues de guardar o recibir confirmacion de envio
 	    url:       'agrega_prueba.php',     //la ruta hacia donde van los datos
        type:      'post',        // el metodo de envio comun es post
        dataType:  'html'        // el tipo de dato que quieres recibir de donde enviaste los datos puede ser html, json, xml
    };
    function responseForm(J){
		if(J.status=='ok'){
			$("#form").addClass("hide");
			$("#form2").removeClass("hide");
			$("#form2").find("#curso-form2").val(J.curso);
			$("#form2").find("#asign-form2").val(J.asignatura);
		}
	}
	 function responseForm2(data){
		if(data!=''){
			$("#pdf").html(data);
		}
	}
  	$('#form').ajaxForm(options_form1);
  	//$('#form2').ajaxForm(options_form2);
  	$("#add-preguntas").click(function(e){
  		var asign = $("#asign-form2").val();
  		var curso = $("#curso-form2").val();
  		var count = $("#table-content>tbody").children("tr").length;
  		$.ajax({
  			url:"tabla_preguntas.php?asign="+asign+"&count="+count,
  			dataType:"html", type:"post",
  			success: function(data){
  				$("#table-content >tbody").append(data);
  			}
  		})
  	}); 
});
</script>
<form class="form-style " id="form" >
	<input type="hidden" name="type" id="type" value="FIRST" />
	<h2>Generar prueba presencial</h2>
	<ul>
		<li class="first">
			<h3>Elija asignatura</h3>
			<p>
				<select id="asignatura" name="asignatura">
					<option value="0">Selecciona</option>
					<?
					while($row = mysql_fetch_array($qasignaturas)){
						echo "<option value='".$row[0]."'>".$row[1]."</option>";
					}
					?>
				</select>
			</p>
		</li>
		<li>
			<h3>Elija curso</h3>
			<p>
				<select id="curso" name="curso">
					<?
					while($row = mysql_fetch_array($qcursos)){
						echo "<option value='".$row[0]."'>".$row[2]." ".$row[1]."</option>";
					}
					?>
				</select>
			</p>
		</li>
		<li class="last">
			<input type="submit" value="Continuar" > 
		</li>
	</ul>
</form>
<form class="form-style hide" id="form2" method="post" action="pdf.php">
	<input type="hidden" name="type" id="type" value="AFTER" />
	<h2>Agregar Preguntas</h2>
	<input type="hidden" id="curso-form2" name="curso" value="" />
	<input type="hidden" id="asign-form2" name="asignatura" value="" />
	<ul>
		<li class="first">
		<button id="add-preguntas" type="button">Agregar</button>
		</li>
	</ul>
	<table id="table-content">
		<thead>
			<tr>
				<th scope="col">Cantidad preguntas</th>
				<th scope="col">Dificultad</th>
				<th scope="col">Contenido</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<input type="submit" value="Generar" />
</form>
<div id="pdf" class="hide">
	
</div>

