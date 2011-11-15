<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.alphanumeric.pack.js"></script>

<script>
  $(document).ready(function(){
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
    			ramge: [2000, 2100]
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
	
  });
</script>

<form class="" id="form" method="post" action="agrega_curso.php">
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
        <select class="enseñanza" name="enseñanza" id="enseñanza" />
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
        <input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
</ul>
</form> 