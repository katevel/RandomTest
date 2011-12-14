<?php session_start();
require("../conexion.php");
$cn = conectar();  
if(!empty($_SESSION['user_id']) && !empty($_SESSION['user_name']) && $_SESSION['user_type']=='Alumno'){ 
	
$query = mysql_query("SELECT
						  Prueba.idprueba,
						  Prueba.nombre,
						  DATE(Prueba.fechaHora_inicio)
						FROM prueba Prueba
						WHERE Prueba.alumno_idalumno = ".@$_SESSION['user_id']."
						    AND Prueba.estado = 'ACTIVA'")or die(mysql_error());
while($row = mysql_fetch_array($query)){
	$nombre = $row[1];
	$fecha = $row[2];
}	
	
	
?>
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
<link rel="stylesheet" type="text/css" href="../css/prueba.css" />
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
					case("resolve"): href = 'resolver.php'; break;
					case("result"): href = 'resultado.php'; break;				
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

<body>
	<div id="system-cont">
	<div id="header">
		
	</div>
	<div id="main">
		<div id="menu">
				<ul id="dropdown_nav">
					<li>
						<a href="Javascript: void(0);" class="option" data-url="resolve"><span>Resolver Prueba</span></a>
					</li>
					<li>
						<a href="Javascript: void(0);" class="option" data-url="result"><span>Resultados</span></a>
					</li>
				</ul>			
		</div>
		<div id="content-system">
			<?if(!empty($nombre)){ 
				$exp = explode("-", $fecha);	
			?>
			<form class="form-style">
				<ul>
					<li class="first">
						
						<h2>
							Tienes una prueba pendiente de <?=$nombre;?> con fecha <?=$exp[2]."/".$exp[1]."/".$exp[0]?>
						</h2>
						<img src="../../img/alert.png" />
					</li>
				</ul>
			</form>
			<?}else{?>
			<form class="form-style">
				<ul>
					<li class="first">
						<p>
							No tienes ninguna prueba pendiente
						</p>
					</li>
				</ul>
			</form>
			<?}?>
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
<?}?>