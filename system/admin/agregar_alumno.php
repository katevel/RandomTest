<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.Rut.js"></script>
<script>
  $(document).ready(function(){
	$('#rut').Rut({
	  on_error: function(){ alert('Rut incorrecto'); },
	  format_on: 'keyup'
	});
	$("#fecha_nac").datepicker({
			changeMonth: true,
			changeYear: true,
			dayNames: ['Domingo','Lunes', 'Martes','Miercoles','Jueves','Viernes','Sabado'],
			dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
			dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sab'],
			dateFormat:'dd/mm/yy',
			prevText: 'Atras',
            nextText: 'Adelante',
			monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
			monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
			maxDate: '-15Y',
			minDate: '-90Y',
			yearRange: '-90Y:-15Y',
            firstDay: 1
	});
    $("#form").validate({
    	rules: {
			rut:{
    			required: true
    		},
    		nombre:{
    			required: true,
    			maxlength: 45
    		},
    		apePat:{
    			required: true,
    			maxlength: 45
    		},
    		apeMat:{
    			required: true,
    			maxlength: 45
    		},
    		fecha_nac: {
    			required: true,
    		},
    		direccion: {
    			required: true,
    			maxlength: 45
    		},
    		telefono: {
    			required: true
    			
    		},
    		pass: {
    			required: true
    		}
    		}
    });		
   	 var options_form1 = { // esta es la variable para ajax form para el primer formulario
        success:   responseFrom1,  // la funcion que hace despues de guardar o recibir confirmacion de envio
 	    url:       './agrega_alumno.php',     //la ruta hacia donde van los datos
        type:      'post',        // el metodo de envio comun es post
        dataType:  'json'        // el tipo de dato que quieres recibir de donde enviaste los datos puede ser html, json, xml
    };
    function responseFrom1(J){
		if(J.status=='ok'){
			$("#form").addClass("hide"); 
			$("#content-system").html("");
		}
	}
  	$('#form').ajaxForm(options_form1);
    
  });
</script>

<form class="form-style" id="form" method="post" action="agrega_alumno.php">
<h2>Agregar Alumno</h2>
<ul>
    <li class="first">
        <h3>RUT Alumno</h3>
        <p>
        	<input type="text" id="rut" name="rut" />
        </p>
    </li>
    <li>
        <h3>Nombre</h3>
        <p>
        	<input type="text" name="nombre"  />
        </p>
    </li>
    <li>
        <h3>Apellido Paterno</h3>
        <p>
        	<input type="text" name="apePat"  />
        </p>
    </li>
    <li>
        <h3>Apellido Materno</h3>
        <p>
        	<input type="text" name="apeMat"  />
        </p>
    </li>
    <li>
        <h3>Fecha Nacimiento</h3>
        <p>
        	<input type="text" name="fecha_nac"  id="fecha_nac"/>
        </p>
    </li>
	<li>
        <h3>Direccion</h3>
        <p>
        	<input type="text" name="direccion"  />
        </p>
    </li>
    <li>
        <h3>Telefono</h3>
        <p>
        	<input type="text" name="telefono"  />
        </p>
    </li>
        <li>
        <h3>password</h3>
        <p>
        	<input type="password" name="pass"  />
        </p>
    </li>
    <li class="last">
        <input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
</ul>
</form> 
