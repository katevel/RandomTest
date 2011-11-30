<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/jquery.alphanumeric.pack.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script>
  $(document).ready(function(){
  	$("#buscarAsig").click(function(e){
  		$.fancybox({
  				'href'				: 'buscar_asignatura.php',
				'width'				: 500,
				'height'			: 400,
				'autoScale'			: false,
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'type'				: 'iframe'
		});
  	});
  	$("#form1").validate({
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
  	
    $("#letra").alphanumeric({allow:"ABC"});
    
	$(".opt-add").live('hover',function(e){
		if(!$(this).hasClass('delete')){
			$(this).removeClass("added").addClass("delete");
		}
	},function(){
		$(this).removeClass("delete").addClass("added");
	});
	
	var options_form1 = { // esta es la variable para ajax form para el primer formulario
        beforeSubmit:  validateForm,  // la funcion antes de enviar los datos aca se pueden verificar los campos
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
			$(".siguiente").removeAttr("disabled");
			$("#form1").addClass("hide"); 
			$("#form2").removeClass("hide");	
		}
	}
	function validateForm1(){//esta funcion se llama antes de enviar los datos sirve para el primer formulario
		$(".siguiente").attr("disabled","disabled");
		
  	}
  	$('#form1').ajaxForm(options_form1); //se captura la funcion del formulario envio (cuando se apreta el boton guardar)
  	$("#form2").ajaxForm(options_form2); // se captura el envio del segundo formulario y se le asignan las variables respectivas
 });
</script>
<form id="form1" class="form-style" name="form_course">
	<h2>Agregar Curso</h2>
	<ul>
    <li class="first">
        <h3>Nivel</h3>
        <p>
        	<input type="text" id="nivel" name="nivel" />
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
        <select class="learning" name="type-learning" id="learning">
    		<option value="basica" selected="selected">Basica</option>
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
	        <input value="Siguiente" class="siguiente" type="submit" >
	    </li>
	</ul>
</form> 
<form id="form2" class="form-style hide" method="post" action="">
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
<form id="form3" class="form-style hide" method="post" action="">
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