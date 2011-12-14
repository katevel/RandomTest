<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../js/jqueryui/css/smoothness/jquery-ui-1.8.16.custom.css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/newmenu.css" />
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/jquery.Rut.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
<script type="text/javascript" src="../js/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="../js/jquery.alphanumeric.pack.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>

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
					case("agregacurso"): href = 'add_curso.php'; break;
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
<? session_start();?>
<? if(!empty($_SESSION['user_id']) && !empty($_SESSION['user_name']) && $_SESSION['user_type']=='Admin'){ 
	
require("../conexion.php");
$cn = conectar();
$query = mysql_query("SELECT
					  Curso.nivel_ens,
					  Curso.letra_curso,
					  Curso.generacion,
					  Curso.tipo_ens  
					FROM curso Curso
					ORDER BY Curso.generacion DESC");
					
				


$qcount_profe = mysql_query("SELECT COUNT(*) FROM profesor WHERE estado_profesor = 'ACTIVO'");
$qcount_alumn = mysql_query("SELECT COUNT(*) FROM alumno WHERE estado = 'ACTIVO'");
	
while($row = mysql_fetch_assoc($query)){
	$cursos[] = $row;
}					
while($rowp = mysql_fetch_array($qcount_profe)){
	$cantidad_profe = $rowp[0];
}	
while($rowa = mysql_fetch_array($qcount_alumn)){
	$cantidad_alumnos = $rowa[0];
}	
?>
<body>
	<div id="system-cont">
	<div id="header">
		<img src="../../img/logo.png" />
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
					<li>
						<a href="#" onclick="Javascript: cerrarSesion();">Cerrar sesion</a>
					</li>
				</ul><br />
			
		</div>
		<div id="content-system">
			<div class="form-style">
				<h2>Cursos Ingresados</h2>
			<ul>
			<? foreach($cursos as $curso){?>
				<li><?=$curso['nivel_ens']." ".$curso['letra_curso']."  /  Generacion:".$curso['generacion']?><?=($curso['tipo_ens']==1)?'  /  Enseñanza Basica':'  /  Enseñanza Media';?></li>
			<?} ?>
			</ul>
			</div>
			<div class="form-style">
				<h2>Cantidad Profesores</h2>
				<ul>
					<li><?=$cantidad_profe." profesores"?></li>
				</ul>
			</div>
			<div class="form-style">
				<h2>Cantidad Alumnos</h2>
				<ul>
					<li><?=$cantidad_alumnos." alumnos"?></li>
				</ul>
			</div>
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
<?}else{
	echo "<script>alert(\'No tienes privilegios en este sitio\');</script>";
	header("Location: ../../index.php");
}?>
</html>