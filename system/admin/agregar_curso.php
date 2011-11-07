<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<style>
body{
	font-family:sans-serif;
}
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
ul input[type="text"], ul input[type="password"]
{
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
    			maxlength: 1
    		},
    		generacion:{
    			required: true,
    			number: true,
    			ramge: [2000, 2100]
    		}
  		},
  		messages:{
				nivel: "Ingresa el nivel",
				letra: "ingresa el curso",
				generacion: "Ingresa la generacion"
		}
    });		
  });
</script>

<form class="" id="form" method="post" action="">
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