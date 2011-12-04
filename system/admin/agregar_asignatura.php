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
    $("#add-contenido").click(function(){
    	var contenido = $("#nuevo-contenido").val();
    	if(contenido!=''){
    		$.ajax({
    			url:"func.search.php?type=content&term="+contenido,
    			type:"POST",dataType:"json",
    			success: function(J){
    				if(J.status=='OK'){
    					$("#contenido-agregado tbody").append("<tr><td>"+J.id+"</td><td>"+J.contenido+"</td><tr>");
    					$("#nuevo-contenido").val("");	
    				}
    			}
    		})
    	}    	
    });	
    var options_form1 = { // esta es la variable para ajax form para el primer formulario
        success:       responseFrom1,  // la funcion que hace despues de guardar o recibir confirmacion de envio
 	    url:       './agrega_asignatura.php',     //la ruta hacia donde van los datos
        type:      'post',        // el metodo de envio comun es post
        dataType:  'json'        // el tipo de dato que quieres recibir de donde enviaste los datos puede ser html, json, xml
    };
    function responseFrom1(J){
		if(J.status=='ok'){
			$("#form1").addClass("hide"); 
			$("#contenido-asignatura").removeClass("hide");
			$("#contenido-asignatura").find("#asignatura").val(J.asignatura);	
		}
	}
  	$('#form').ajaxForm(options_form1);	
  });
</script>
 <?php
$query1 = mysql_query("select idprofesor, nombre_profesor, apePat_profesor from profesor order by idprofesor asc ")or die(mysql_error());

?>
<form class="form-style" id="form">
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
<div id="contenido-asignatura" class="form-style hide">
	<h3>Agregar Contenido</h3>
	<input type="hidden" id="asignatura" value="" />
	<input type="text" id="nuevo-contenido" size="50"/>
	<button type="button" id="add-contenido">Guardar</button>
	<table id="contenido-agregado">
		<thead>
			<td>ID</td>
			<td>Nombre Contenido</td>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<button type="button" id="Guardar-todo">Guardar</button>
</div>
