<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.Rut.js"></script>
<link rel="stylesheet" type="text/css" href="../css/newmenu.css" />
	<script type="text/javascript">
$(document).ready(function(){
	$('#dropdown_nav li').find('.sub_nav').hide();

			//When hovering over the main nav link we find the dropdown menu to the corresponding link.
		$('#dropdown_nav li').hover(function() {
				//Find a child of 'this' with a class of .sub_nav and make the beauty fadeIn.
				$(this).find('.sub_nav').fadeIn(100);
		}, function() {
				//Do the same again, only fadeOut this time.
				$(this).find('.sub_nav').fadeOut(50);
		});
		
		$(".option").click(function(e){
			var type = $(this).attr("data-url"); //verifica hacia que archivo irá, cuando se hace click en el menu
			var href = "";
			if(type!=''){
				switch(type){// aqui se verifica la url que hay que traer
					case("agregaalu"): href = 'agregar_alumno.php'; break;
					case("agregacurso"): href = 'agregar_curso.php'; break;
					case("agregadoc"): href = 'agregar_profesor.php'; break;
					case("agregaasig"): href = 'agregar_asignatura.php'; break;
				}
	        	$.ajax({  
		            url: href, //esta variable se declara en la clasificacion va a variar segun el atributo type   
		            success: function(data) {
	            	 $("#contetn-system").html("");   
	                 $('#content-system').html(data).show('slow');
	            	}  
	        	});  
        	}
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
							<li><a id="veralu" class="option" data-url=" " href="Javascript: void(0);"><span>Ver Alumnos</span></a></li>
							<li><a class="option" data-url="agregaalu" href="Javascript: void(0);"><span>Agregar Alumno </span></a></li>
							<li><a class="option" data-url="" href="Javascript: void(0);"><span>Modificar Alumno</span></a></li>
						</ul>
					</li>
					<li><a href="#"><span>DOCENTES</span></a>
						<ul class="sub_nav">
							<li><a class="option" data-url=" " href="Javascript: void(0);"><span>Ver Docentes</span></a></li>
							<li><a class="option" data-url="agregadoc" href="Javascript: void(0);"><span>Agregar Docente</span></a></li>
							<li><a class="option" data-url=" " href="Javascript: void(0);"><span>Modificar Docente</span></a></li>
						</ul>
					</li>
					<li><a href="#"><span>CURSOS</span></a>
						<ul class="sub_nav">
							<li><a class="option" data-url=" " href="Javascript: void(0);"><span>Ver Cursos</span></a></li>
							<li><a class="option" data-url="agregacurso" href="Javascript: void(0);"><span>Agregar Curso</span></a></li>
							<li><a class="option" data-url="" href="Javascript: void(0);"><span>Modificar Curso</span></a></li>
						</ul>
					</li>
					<li><a class="last" href="#"><span>ASIGNATURAS</span></a>
						<ul class="sub_nav">
							<li><a class="option" data-url=" " href="Javascript: void(0);"><span>Ver Asignaturas</span></a></li>
							<li><a class="option" data-url="agregaasig" href="Javascript: void(0);"><span>Agregar Asignaturas</span></a></li>
							<li><a class="option" data-url=" " href="Javascript: void(0);"><span>Modificar Asignaturas</span></a></li>
						</ul>
					</li>
				</ul><br />
			
		</div>
		<div id="content-system">
			
			
		</div>	
	</div>
	<div class="push"></div>
	</div>
		
	<div id="footer">
		<div class="footer-center">
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