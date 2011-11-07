
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
    $("#form").validate();
		rules: {
    		rut: "required"
  		}
  });
</script>

<form class="" id="form" method="post" action="">
<h2>Agregar Docente</h2>
<ul>
    <li class="first">
        <h3>RUT Docente</h3>
        <p>
        	<input type="text" id="rut" name="rut" />
        </p>
    </li>
    <li>
        <h3>Nombre</h3>
        <p>
        	<input type="text" name="name"  />
        </p>
    </li>
    <li>
        <h3>Apellido Paterno</h3>
        <p>
        	<input type="text" name="last_name"  />
        </p>
    </li>
    <li>
        <h3>Apellido Materno</h3>
        <p>
        	<input type="text" name="mother_name"  />
        </p>
    </li>
    <li>
        <h3>Fecha Nacimiento</h3>
        <p>
        	<input type="text" name="fecha_nac"  />
        </p>
    </li>
	<li>
        <h3>Direccion</h3>
        <p>
        	<input type="text" name="location"  />
        </p>
    </li>
    <li>
        <h3>Telefono</h3>
        <p>
        	<input type="text" name="phone"  />
        </p>
    </li>
    <li class="last">
        <input id="guardar" value="Guardar" class="submit" type="submit">
    </li>
</ul>
</form> 