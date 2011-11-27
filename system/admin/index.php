<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link type="text/css" href="../css/menu.css" rel="stylesheet" />
<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/menu.js"></script>

<script>
	$(document).ready(function(){
		$("#add-teacher").click(function(){
			$("#ajax-content").append("<h3>HOLA</h3>");
		});
	});
</script>

<!-------------------------------------------->
</head>
<body>
	<div id="system-cont">
	<div id="header">
		
	</div>
	<div id="main">
		<div id="menu">
				 <ul class="menu">
        <li><a href="#" class="parent"><span>Alumnos</span></a>
            <div>
            <ul>
                <li><a href="#" class="parent"><span>Ver alumnos</span></a></li>
                        <li><a href="#"><span>Agregar Alumno</span></a></li>
                        <li><a href="#"><span>Modificar Alumno</span></a></li>
            
            </ul>
            </div>
        </li>
        <li><a href="#" class="parent"><span>Docentes</span></a>
        	<div><ul>
                <li><a href="#" class="parent"><span>Ver Docentes</span></a>
				<li>
					<a id="add-teacher" href="#">
						<span>Agregar Docente</span>
					</a>
				</li>
				<li><a href="#"><span>Modificar Docente</span></a></li>
            </ul></div>
            
        </li>
        <li><a href="#" class="parent"><span>Cursos</span></a>
        	
            <div><ul>
                <li><a href="#" class="parent"><span>Ver Cursos</span></a>
				<li><a href="#"><span>Agregar Curso</span></a></li>
				<li><a href="#"><span>Modificar Curso</span></a></li>
            </ul></div>
            
        </li>
                <li><a href="#" class="parent"><span>Asignaturas</span></a>
        	
            <div><ul>
                <li><a href="#" class="parent"><span>Ver Asignaturas</span></a>
				<li><a href="#"><span>Agregar Asignatura</span></a></li>
				<li><a href="#"><span>Modificar Asignatura</span></a></li>
            </ul></div>
            
        </li>
    </ul>
		
		
		</div>	
		
		<div id="content-system">
			<div id="ajax-content">
				
			</div>
			
		</div>		
	</div>
	</div>
	<div id="footer">
		<div id="footer-center">
			<p>Random Test &copy; <?=date("Y");?>. Todos los derechos reservados</p>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Servicios</a></li>
				<li><a href="#">Nosotros</a></li>
				<li><a id="help" href="#">Ayuda</a></li>
				<li><a href="#">Contacto</a></li>
			</ul>
		</div>
	</div>	
</body>
</html>
