<form class="form-style" id="form" method="post" action="agrega_profesor.php">
<h2>Agregar Profesor</h2>
<ul>
    <li class="first">
        <h3>RUT Profesor</h3>
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
        	<input type="text" name="fecha_nac" id="fecha_nac" />
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