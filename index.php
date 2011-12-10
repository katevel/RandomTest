<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/default.css" />
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/menu2.css" />
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="js/mobilyslider.js"></script>
<script type="text/javascript" src="js/login.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="system/js/jquery.Rut.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/* 	1st example	*/

			/// wrap inner content of each anchor with first layer and append background layer
			$("#menu li a").wrapInner( '<span class="out"></span>' ).append( '<span class="bg"></span>' );

			// loop each anchor and add copy of text content
			$("#menu li a").each(function() {
				$( '<span class="over">' +  $(this).text() + '</span>' ).appendTo( this );
			});

			$("#menu li a").hover(function() {
				// this function is fired when the mouse is moved over
				$(".out",	this).stop().animate({'top':	'45px'},	250); // move down - hide
				$(".over",	this).stop().animate({'top':	'0px'},		250); // move down - show
				$(".bg",	this).stop().animate({'top':	'0px'},		120); // move down - show

			}, function() {
				// this function is fired when the mouse is moved off
				$(".out",	this).stop().animate({'top':	'0px'},		250); // move up - show
				$(".over",	this).stop().animate({'top':	'-45px'},	250); // move up - hide
				$(".bg",	this).stop().animate({'top':	'-45px'},	120); // move up - hide
			});
			
			
			
			
			
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

});
</script>

<!-------------------------------------------->
</head>
<body>
	<div id="header">
		<img src="img/logo.png" />
	</div>
	<div id="main">
		<div id="menu" class="menu">
			<ul>
				<li><a href="Javascript: void(0);">Home</a></li>
				<li><a href="Javascript: void(0);">Nosotros</a></li>
				<li><a href="Javascript: void(0);">Clientes</a></li>
				<li><a href="Javascript: void(0);">Contacto</a></li>
			</ul>
		</div>
		<div id="content-index">
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
		<div class="push"></div>
	</div>
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
