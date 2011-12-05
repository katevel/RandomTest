<script type="text/javascript">
$(document).ready(function(){
  $("#searchAlumno").click(function(e){
  	var curso = $("#curso_added").val();
  	
  	if(curso!=''){
	  	$.fancybox({
	    		'href'				: 'buscar_alumno.php?course='+curso,
	    		'width'				: 750,
				'height'			: 420,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
	    });
	  }
  });
  $("#searchAsig").click(function(e){
  	 var curso = $("#curso_added2").val();
  	 if(curso!=''){
  	 	$.fancybox({
	    		'href'				: 'buscar_asignatura.php?course='+curso,
	    		'width'				: 750,
				'height'			: 420,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
	    });
  	 }
  });
   $("#form").validate({
    	rules: {
			nivel:{
    			required: true,
    			number: true,
    			maxlength: 1
    		},
    		letra:{
    			required: true,
    			maxlength: 1,
    		},
    		generacion:{
    			required: true,
    			number: true,
    			range: [2000, 2100]
    		}
  		},
  		messages:{
				nivel: {
					required:"* Debes ingresar el nivel del curso",
					number: "* Debes ingresar un numero",
					maxlength: "* Solo debe ser 1 numero"
				},
				letra: {
					required: "* Debes ingresar la letra",
					maxlenght: "Puede ser solo 1 letra",
				},
				generacion: "* Ingresa la generacion"
			}
    });
    var options_form1 = { // esta es la variable para ajax form para el primer formulario
        success:       responseFrom1,  // la funcion que hace despues de guardar o recibir confirmacion de envio
 	    url:       './agrega_curso.php',     //la ruta hacia donde van los datos
        type:      'post',        // el metodo de envio comun es post
        dataType:  'json'        // el tipo de dato que quieres recibir de donde enviaste los datos puede ser html, json, xml
    };
    function responseFrom1(J){
		if(J.status=='ok'){
			$("#form").addClass("hide");
			$("#form2").removeClass("hide");
			$("#form2").find("#curso_added").val(J.curso);
			$("#form3").find("#curso_added2").val(J.curso);  
		}
	}
  	$('#form').ajaxForm(options_form1);
  	$("#go-to-asign").click(function(e){
  		$("#form2").addClass("hide");
  		$("#form3").removeClass("hide");
  	});
  	$("#close-add").click(function(e){
  		$("#contetn-system").html("");   
  	});	
  });
</script>
<form class="form-style" id="form">
<h2>Agregar Asignatura</h2>
<ul>
    <li class="first">
        <h3>Nivel</h3>
        <p>
    	<select id="nivel" name="nivel">
    		<option value="1" selected="selected">1</option>
    		<option value="2" >2</option>
    		<option value="2" >3</option>
    		<option value="4" >4</option>
    		<option value="5" >5</option>
    		<option value="6" >6</option>
    		<option value="7" >7</option>
    		<option value="8" >8</option>
    	</select> <br />
        </p>
    </li>
    <li>
        <h3>Letra</h3>
        <p>
        	<input type="text" id="letra" name="letra" />
        </p>
    </li>
    <li>
    	<h3>Nivel de enseñanza</h3>
    	<p>
    		<select name="type-learning" id="learning">
    			<option value="1">Básica</option>
    			<option value="2">Media</option>
    		</select>
    	</p>
    </li>
    <li>
        <h3>Generación</h3>
        <p>
        	<input type="text" id="generacion" name="generacion" />
        </p>
    </li>
    <li class="last">
        <input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
</ul>
</form>
<div id="form2" class="form-style hide">
	<h2>Agregar alumnos</h2>
	<input type="hidden" id="curso_added" />
	<table id="table-selected">
		<thead>
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Apellido</th>
				<th scope="col">Rut</th>
				<th scope="col">Opción</th>
				<th scope="col"><button type="button" id="searchAlumno" class="button-search">Buscar</button></th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
	<ul>
		<li class="last">
			<button type="button" id="go-to-asign">Agregar Asignaturas</button>		
		</li>
	</ul>
	
</div>
<div id="form3" class="form-style hide">
	<h2>Agregar Asignaturas</h2>
	<input type="hidden" id="curso_added2" />
	<div id="table-asignatura">
		<table id="table-selected">
			<tbody>
				<tr>
					<td>Nombre</td>
					<td>Profesor</td>
					<td>Opcion</td>
					<td><button type="button" id="searchAsig" class="button-search">Buscar</button></td>
				</tr>
			</tbody>
		</table>
	</div>
	<ul>
		<li class="last">
			<button type="button" id="close-add">Guardar</button>
		</li>
	</ul>
</div>  