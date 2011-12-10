/*$("#buscarAsig").click(function(e){
  		var level = $('#level option: selected').val();
  		$.fancybox({
  				'href'				: 'buscar_asignatura.php?level=level'
				'width'				: 500,
				'height'			: 400,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
		});
  	});*/
<form id="form2" class="form-style hide">
	<h2>Agregar alumnos</h2>
	<div id="table-selected">
		<table>
			<tbody>
				<tr>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Rut</td>
					<td>Opcion</td>
					<td><button type="button" id="buscarAlu">Buscar</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</form> 
<form id="form3" class="form-style hide" >
	<h2>Agregar Asignaturas</h2>
	<div id="table-selected">
		<table>
			<tbody>
				<tr>
					<td>Nombre</td>
					<td>Profesor</td>
					<td>Opcion</td>
					<td><button type="button" id="buscarAsig">Buscar</button></td>
				</tr>
			</tbody>
		</table>
	</div>
</form> 

<form id="form1" class="form-style"  action="#">
	<h2>Agregar Curso</h2>
	<ul>
    <li class="first">
        <h3>Nivel</h3>
        <p>
        <select name="level" id="level">
    		<option value="1" >1</option>
    		<option value="2" >2</option>
    		<option value="2" >3</option>
    		<option value="4" >4</option>
    		<option value="5" >5</option>
    		<option value="6" >6</option>
    		<option value="7" >7</option>
    		<option value="8" >8</option>
   		</select>
        </p>
    </li>
    <li>
        <h3>Letra</h3>
        <p>
        	<input type="text" id="letra" name="letra"  />
        </p>
    </li>
    <li>
        <h3>Nivel de ense&ntilde;za</h3>
        <p>
        <select name="type-learning" id="learning">
    		<option value="basica" >Basica</option>
    		<option value="media" >Media</option>
   		</select>
        </p>
    </li>
    <li>
        <h3>Generacion</h3>
        <p>
        	<input type="text" name="generacion" id="generacion" />
        </p>
    </li>
	    <li class="last">
        	<input id="next" value="Guardar"  type="submit">
    	</li
	</ul>
</form> 
<script>
$(document).ready(function(){
  	
  	/*$("#letra").alphanumeric({allow:"ABC"});
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
    var option_form2 = {
    	beforeSubmit: validateForm,
    	success: 	  responseForm2,
    
    }
    function responseForm2(){
    	$("#form2").addClass("hide");
    	$("#form3").removeClass("hide");
    } 
 	function responseFrom1(J){
		if(J.status=='ok'){
			$("#form1").addClass("hide"); 
			$("#form2").removeClass("hide");	
		}
	}
  	$('#form').ajaxForm(options_form1); //se captura la funcion del formulario envio (cuando se apreta el boton guardar)
  	$("#form2").ajaxForm(options_form2); // se captura el envio del segundo formulario y se le asignan las variables respectivas
 	
 	*/
});
</script>