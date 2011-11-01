<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<link rel="stylesheet" type="text/css" href="../js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript" src="../js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script type="text/javascript"> 
            $(function() {
                $('#navigation > div').hover(
                function () {
                    var $this = $(this);
					//$this.find('.images').fadeIn();
					
					$this.find('a.menu').removeClass('menu').addClass('hovered');
					
                    $this.find('.images').stop().animate({
                        'width'     :'230px',
                        'height'    :'390px',
                        'opacity'   :'1.0'
                    },400,'easeOutBack',function(){
					
                        $(this).parent().find('div').fadeIn('fast');
                    });
                },
                function () {
                    var $this = $(this);
					
                    $this.find('div').fadeOut(500);
					//$this.find('.images').hide();
                   $this.find('a.hovered').removeClass('hovered').addClass('menu');
				   
				    $this.find('.images').stop().animate({
                        'width'     :'100px',
                        'height'    :'0px',
                        'top'       :'0px',
                        'left'      :'0px',
                        'opacity'   :'0.9'
                    },600,'easeOutBack'); 
              }
            );
            });
</script>

<!-------------------------------------------->
</head>
<body>
	<div id="header">
		
	</div>
	<div id="main">
		<div id="menu">
			<div class="total_images" id="navigation">
			 
                <div class="eachs" id="link1"> 
					
					<a href="#" class="menu" style=" width:90px;">99Points</a>
					
                    <img src="../img/bg.png" alt="" width="140" height="140" class="images"/> 
					
                    <div> 
                        <ul>
							<li><a href="#">PHP</a></li>
							<li><a href="#">CodeIgniter</a></li>
							<li><a href="#">JQuery</a></li>
							<li><a href="#">AJAX</a></li>
							<li><a href="#">Facebook</a></li>
							
							<li><a href="#">YOUTUBE</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">MYSQL</a></li>
							<li><a href="#">Tutorials</a></li>
						</ul>
                    </div>  
                </div> 
				
				<div class="eachs" id="link4"> 
				
					<a href="#" class="menu" style=" width:90px;">JQuery</a>
					
                    <img src="../img/bg.png" alt="" width="140" height="140" class="images"/> 
                   
                    <div>
                        <ul>
							<li><a href="#">PHP</a></li>
							<li><a href="#">CodeIgniter</a></li>
							<li><a href="#">JQuery</a></li>
							<li><a href="#">AJAX</a></li>
							<li><a href="#">Facebook</a></li>
							
							<li><a href="#">YOUTUBE</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">MYSQL</a></li>
							<li><a href="#">Tutorials</a></li>
						</ul>                    </div> 
                </div> 
				
				
                <div class="eachs" id="link2"> 
					
					<a href="#" class="menu" style=" width:100px;">FaceBook</a>
					
                    <img src="../img/bg.png" alt="" width="160" height="199" class="images"/> 
                    
                    <div> 
                        <ul>
							<li><a href="#">PHP</a></li>
							<li><a href="#">CodeIgniter</a></li>
							<li><a href="#">JQuery</a></li>
							<li><a href="#">AJAX</a></li>
							<li><a href="#">Facebook</a></li>
							
							<li><a href="#">YOUTUBE</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">MYSQL</a></li>
							<li><a href="#">Tutorials</a></li>
						</ul>
						                    </div>  
                </div> 
				
				
                <div class="eachs" id="link3"> 
					
					<a href="#" class="menu" style=" width:72px;">PHP</a>
					
                    <img src="../img/bg.png" alt="" width="160" height="199" class="images"/> 
                   
                    <div> 
                        <ul>
							<li><a href="#">PHP</a></li>
							<li><a href="#">CodeIgniter</a></li>
							<li><a href="#">JQuery</a></li>
							<li><a href="#">AJAX</a></li>
							<li><a href="#">Facebook</a></li>
							
							<li><a href="#">YOUTUBE</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">MYSQL</a></li>
							<li><a href="#">Tutorials</a></li>
						</ul>                    </div> 
                </div> 
               
                <div class="eachs" id="link5"> 
					
					<a href="#" class="menu" style=" width:84px;">AJAX</a>
					
                    <img src="../img/bg.png" alt="" width="160" height="199" class="images"/> 
                    
                    <div> 
                        <ul>
							<li><a href="#">PHP</a></li>
							<li><a href="#">CodeIgniter</a></li>
							<li><a href="#">JQuery</a></li>
							<li><a href="#">AJAX</a></li>
							<li><a href="#">Facebook</a></li>
							
							<li><a href="#">YOUTUBE</a></li>
							<li><a href="#">CSS</a></li>
							<li><a href="#">MYSQL</a></li>
							<li><a href="#">Tutorials</a></li>
						</ul>                    
					</div> 
                </div> 
				<br clear="all" /><br clear="all" /><br clear="all" /><br clear="all" />
            </div>
		</div>
		
		<div id="content-system">
			
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
