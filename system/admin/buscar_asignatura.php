<?php
require("../conexion.php");
$cn = conectar();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Random TEST</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/modal.css" />
<script type="text/javascript">
$(document).ready(function(){
	$("#find-asig").click(function(e){
		var asignatura = $("#search-text").val();
		if(asignatura!=''){
			$.ajax({
			url:"func.search.php?type=search2&term2="+asignatura,
			dataType:"html", type:"post",
			success: function(data){
					if(data!=''){
						$("#list-searching tbody").append(data);
					}else{
						alert("No se encontraron resultados");
					}	
				}
			});	
		}else{
			alert("Ingrese nombre de la asignatura");
			$("#search-text").focus();
		}
	});
});
function agregar(_this){
	if(_this!=''){
		$.ajax({
			url:"func.search.php?type=embed2&term2="+_this,
			dataType:"html", type:"post",
			success: function(data){
				if(data!=''){
					top.$("#table-selected tbody").append(data);
					alert("Se agrego la asignatura al curso correctamente");
				}
			}
		});
	}
}
</script>
</head>
<body>
<div id="search">
	<input type="text" id="search-text" class="ui-widget-content" placeholder="Introduce el nombre a buscar... " size="60"/>
	<button id="find-asig">Buscar</button>
</div>
<table id="list-searching">
	<tbody>
		<tr>
			<td>Nombre</td>
			<td>Profesor</td>
		</tr>
	</tbody>
</table>
</body>
</html>