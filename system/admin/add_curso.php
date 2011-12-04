<link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	

  $("#searchAlumno").click(function(e){
  
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
		}
	}
  	$('#form').ajaxForm(options_form1);	
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
	<button type="button" id="searchAlumno">Buscar</button>
	<table id="table">
		<thead>
			<tr>
				<th scope="col">Nombre</th>
				<th scope="col">Apellido</th>
				<th scope="col">Rut</th>
				<th scope="col">Opcion</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>
</div> 