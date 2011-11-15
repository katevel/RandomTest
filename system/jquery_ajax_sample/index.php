<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="../../js/jquery.js"></script>
<script>
	$(document).ready(function(){
		$("#save").click(function(e){
			var nombre = $("#nombre").val();
			var apellido = $("#apellido").val();
			$.ajax({
				url:"saving.php?name="+nombre+"&apellido="+apellido,
				type:"POST", dataType:"json",
				beforeSend: function(){
					if(nombre=='' && apellido==''){
						alert("rellena los campos");
					}
				},
				success: function(J){
					if(J.status=='OK'){
						alert(J.msg);
					}
				}
			});
			
		});
	});
</script>

<!-------------------------------------------->
</head>
<body>
<div id="ejemplo">
	<input type="text" id="nombre"  placeholder="nombre" /><br>
	<input type="text" id="apellido" placeholder="apellido"/><br>
	<button id="save">Guardar</button>
</div>
</body>
</html>
