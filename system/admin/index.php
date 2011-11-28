<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="../css/newmenu.css" />
	<script type="text/javascript">
		$(function() {
			//We initially hide the all dropdown menus
			$('#dropdown_nav li').find('.sub_nav').hide();

			//When hovering over the main nav link we find the dropdown menu to the corresponding link.
			$('#dropdown_nav li').hover(function() {
				//Find a child of 'this' with a class of .sub_nav and make the beauty fadeIn.
				$(this).find('.sub_nav').fadeIn(100);
			}, function() {
				//Do the same again, only fadeOut this time.
				$(this).find('.sub_nav').fadeOut(50);
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
				<ul id="dropdown_nav">
					<li><a href="#"><span>ALUMNOS</span></a>
						<ul class="sub_nav">
							<li><a href="#"><span>Ver Alumnos</span></a></li>
							<li><a href="#"><span>Agregar Alumno </span></a></li>
							<li><a href="#"><span>Modificar Alumno</span></a></li>
						</ul>
					</li>
					<li><a href="#"><span>DOCENTES</span></a>
						<ul class="sub_nav">
							<li><a href="#"><span>Ver Docentes</span></a></li>
							<li><a href="#"><span>Agregar Docente</span></a></li>
							<li><a href="#"><span>Modificar Docente</span></a></li>
						</ul>
					</li>
					<li><a href="#"><span>CURSOS</span></a>
						<ul class="sub_nav">
							<li><a href="#"><span>Ver Cursos</span></a></li>
							<li><a href="#"><span>Agregar Curso</span></a></li>
							<li><a href="#"><span>Modificar Curso</span></a></li>
						</ul>
					</li>
					<li><a class="last" href="#"><span>ASIGNATURAS</span></a>
						<ul class="sub_nav">
							<li><a href="#"><span>Ver Asignaturas</span></a></li>
							<li><a href="#"><span>Agregar Asignaturas</span></a></li>
							<li><a href="#"><span>Modificar Asignaturas</span></a></li>
						</ul>
					</li>
				</ul><br />
			
		</div>
		<div id="content-system">
			
			
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