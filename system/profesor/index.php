<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="../../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="../js/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.Rut.js"></script>
<script type="text/javascript" src="../js/jquery.form.js"></script>
<script type="text/javascript" src="../js/jquery.reset.js"></script>
<script type="text/javascript" src="../js/funciones.js"></script>
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
					case("add-preg"): href = 'agregar_pregunta.php'; break;
					case("gen-test"): href = 'generar_prueba.php'; break;
					case("see-result"): href = 'ver_resultados.php'; break;
					case("gen-presencial"): href = 'presencial.php'; break;
					case("gen-online"): href = 'online.php'; break;
				}
	        	$.ajax({  
		            url: href, //esta variable se declara en la clasificacion va a variar segun el atributo type   
		            success: function(data) {
	            	 $("#content-system").html("");   
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

<?php if(!empty($_SESSION['user_id']) && !empty($_SESSION['user_name']) && $_SESSION['user_type']=='Profesor'){ 

require("../conexion.php");
$cn = conectar();	
$q_asign = mysql_query("SELECT
						Asignatura.nombre_asignatura
						FROM profesor_has_asignatura AS Has,
						asignatura Asignatura
						WHERE Has.profesor_idprofesor = ".@$_SESSION['user_id']."
						AND Asignatura.idasignatura = Has.asignatura_idasignatura");	
							
$q_count = mysql_query("SELECT
						  COUNT(*)AS count
						FROM pregunta
						WHERE profesor_idprofesor = ".@$_SESSION['user_id']." ");							
							
while($asg = mysql_fetch_array($q_asign)){
	$asignaturas[] = $asg[0];
}	
while($row = mysql_fetch_array($q_count)){
	$count = $row[0];
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
					<li>
						<a href="Javascript: void(0);" data-url="add-preg" class="option">
						<span>Ingresar Preguntas</span>
						</a>
					</li>
					<li><a href="#"><span>Generar Prueba</span></a>
						<ul class="sub_nav">
							<li><a class="option" data-url="gen-presencial" href="Javascript: void(0);"><span>Prueba Presencial</span></a></li>
							<li><a class="option" data-url="gen-online" href="Javascript: void(0);"><span>Prueba Online</span></a></li>
						</ul>
					<!--<li>
						<a href="Javascript: void(0);" data-url="gen-test" class="option">
						<span>Generar Prueba</span>
						</a>
					</li>-->
					<li>
						<a href="Javascript: void(0);" data-url="see-result" class="option">
							<span>Resultados</span>
						</a>
					</li>
					<li>
						<a href="#" onclick="Javascript: cerrarSesion();">Cerrar sesion</a>
					</li>
				</ul>				
		</div>
		<div id="content-system">
			<div class="form-style">
				<h3>Tus Asignaturas</h3>
				<ul><? 
					for ($i=0; $i<=count($asignaturas)-1; $i++){?>
						<li><?=$asignaturas[$i]?> <img src="../../img/tick.png"</li>
					<?}?>
				</ul>
			</div>
			<div class="form-style">
				<h3>Cantidad de preguntas Ingresadas</h3>
				<ul>
					<li><?=$count?></li>
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
<? }else{
	echo "<script>alert(\'No tienes privilegios en este sitio\');</script>";
	header("Location: ../../index.php");
} ?>
</html>
