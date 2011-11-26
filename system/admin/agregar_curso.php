<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/jquery.alphanumeric.pack.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script>
  $(document).ready(function(){
  	$("#buscarAlu").click(function(e){
  		$.fancybox({
  				'href'				: 'buscar_alumno.php',
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
	
	 var options_form1 = { 
        //target:        '#output1',   // target element(s) to be updated with server response 
        beforeSubmit:  validateForm1,  // pre-submit callback 
        success:       responseFrom1,  // post-submit callback 
 
        // other available options: 
        url:       './agrega_curso.php',         // override for form's 'action' attribute 
        type:      'post',        // 'get' or 'post', override for form's 'method' attribute 
        dataType:  'json'        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind form using 'ajaxForm' 
    $('#form1').ajaxForm(options_form1); 
	function responseFrom1(J){
		if(J.status=='ok'){
			$(".siguiente").removeAttr("disabled");
			$("#form1-div").addClass("hide"); 
			$("#form2-div").removeClass("hide");	
		}
	}
	function validateForm1(){
		$(".siguiente").attr("disabled","disabled");
		
		
  				
  	}
 });
</script>

<div id="form1-div" class="hide">
	<form id="form1" method="post" name="form_course">
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
        <select class="learning" name="type-learning" id="learning" />
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
	        <input value="Siguiente" class="siguiente" type="submit" data-goto="form2">
	    </li>
	</ul>
	</form> 
</div>


<div id="form2-div" class="">
	<form id="form2" method="post" action="">
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

</div>