<?php
require("../conexion.php");
$cn = conectar();

?>
<link rel="stylesheet" type="text/css" href="../css/modal.css" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	
	$("#find-asig").click(function(e){
		var asignatura = $("#search-text").val();
		if(asignatura!=''){
			var course = <?=$_GET['course']?>;
			$.ajax({
			url:"func.search.php?type=search2&term2="+asignatura+"&course="+course,
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
function agregar(_this, course){
	if(_this!=''){
		$.ajax({
			url:"func.search.php?type=embed2&term2="+_this+"&course="+course,
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
<div id="search" class="form-style" style="margin-left:8%;">
	<h2>Buscar Asignatura</h2>
	<ul>
		<li class="first">
			<h3>Nombre Asignatura</h3>
			<p>
				<input type="text" id="search-text" class="ui-widget-content" placeholder="Introduce el nombre a buscar... " size="60"/>
			</p>
		</li>
		<li class="last">
			<button id="find-asig">Buscar</button>
		</li>
	</ul>
	
</div>
<table id="list-searching">
	<tbody>
		<tr>
			<td>Nombre</td>
			<td>Profesor</td>
		</tr>
	</tbody>
</table>
