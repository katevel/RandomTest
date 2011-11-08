<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.alphanumeric.pack.js"></script>
<style>
body{
	font-family:sans-serif;
}ç

img 
{
    border:none;
}
ul, ul li
{
    list-style-type: none;
    margin: 0;
    padding: 0;
}
ul li.first
{
    border-top: 1px solid #DFDFDF;
}
ul li.last
{
    border: none;
}
ul p
{
    float: left;
    margin: 0;
    width: 310px;
}
ul h3
{
    float: left;
    font-size: 14px;
    font-weight: bold;
    margin: 5px 0 0 0;
    width: 200px;
    margin-left:20px;
}
ul li
{
    border-bottom: 1px solid #DFDFDF;
    padding: 15px 0;
    width:600px;
    overflow:hidden;
}
ul select{
	width:300px;
	padding: 5px;
	position: relative;
	border: solid 1px #666;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
}
ul input[type="text"], ul input[type="password"]{
    width:300px;
    padding:5px;
    position:relative;
    border:solid 1px #666;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
}
ul input.required 
{
    border: solid 1px #f00;
}
ul input.error{
	border: solid 1px #FF0000;
}
li label.error{
	color: #FF0000;
	font-family:Arial, Helvetica, sans-serif;
	font-style: italic;
	padding-left:5px;
}
li select.error{
	color: #FF0000;
	font-family:Arial, Helvetica, sans-serif;
	font-style: italic;
	padding-left:5px;
}
li input[type="submit"]{
	float: right;
	margin-right: 80px;
	width: 90px;
	height: 40px;
}
</style>

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