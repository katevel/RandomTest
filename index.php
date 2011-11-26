<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="js/mobilyslider.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="system/js/jquery.Rut.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#secret-user-name').Rut({
	  on_error: function(){ alert('Rut incorrecto'); },
	  format_on: 'keyup'
	});

	$('.slider').mobilyslider({
		content: '.sliderContent',
		children: 'div',
		transition: 'horizontal',
		animationSpeed: 500,
		autoplay: true,
		autoplaySpeed: 3000,
		pauseOnHover: false,
		bullets: false,
		arrows: true,
		arrowsHide: true,
		prev: 'prev',
		next: 'next',
		animationStart: function(){},
		animationComplete: function(){}
	});
	/*$("#help").click(function(e){
		$.fancybox({
			'url'	: 'modals/help.php',
			'width' : 400,
			'height': 'auto',
			'type' : 'iframe',
			'showCloseButton' : true			
		});
	});*/
});
</script>

<!-------------------------------------------->
</head>
<body>
	<div id="header">
		
	</div>
	<div id="main">
		<div id="content">
			<div class="slider">
				<div class="sliderContent">
					<div class="item">
						<img src="img/img1.jpg" alt="" />
					</div>
					<div class="item">
						<img src="img/img2.jpg" alt="" />
					</div>
					<div class="item">
						<img src="img/img3.jpg" alt="" />
					</div>
					<div class="item">
						<img src="img/img4.jpg" alt="" />
					</div>
					<div class="item">
						<img src="img/img5.jpg" alt="" />
					</div>
					<div class="item">
						<img src="img/img6.jpg" alt="" />
					</div>
				</div>
			</div>
		</div>
		<div id="sidebar">
			<div class="login-block last"> 
	            <h3>Ingreso Usuario</h3>
	            <form method="post" action="system/ingresovalidacion.php">
	                <p>
	                	<label for="secret-user-name">Usuario</label>
	                	<input type="text" name="secret-user-name" id="secret-user-name" />
	                </p>
	                <p>
	                	<label for="secret-password">Contraseña</label>
	                	<input type="password" name="secret-password" id="secret-password" />
	                </p>
	                <p class="submit-wrap">
	                	<input type="submit" id="ftp-submit" class="button" value="Entrar" />
	                </p>
	            </form>
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
