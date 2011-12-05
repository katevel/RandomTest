<?php
require("../conexion.php");
$cn = conectar();

?>
<link rel="stylesheet" type="text/css" href="../css/modal.css" />
<link rel="stylesheet" type="text/css" href="../../css/style.css" />
<link rel="stylesheet" type="text/css" href="../css/formvalidate.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
<script type="text/javascript" src="../js/jquery.Rut.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	$('#search-text').Rut({
	  on_error: function(){ alert('Rut incorrecto'); },
	  format_on: 'keyup'
	});
	$("#find-child").click(function(e){
		var rut = $("#search-text").val();
		var course = <?=$_GET['course'];?>;
		if(rut!=''){
			$.ajax({
			url:"func.search.php?type=search&term="+rut+"&course="+course,
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
			alert("Ingrese el rut del alumno");
			$("#search-text").focus();
		}
	});
});
function agregar(_this, course){
	if(_this!='' && course!=''){
		$.ajax({
			url:"func.search.php?type=embed&term="+_this+"&course="+course,
			dataType:"html", type:"post",
			success: function(data){
				if(data!=''){
					top.$("#table-selected tbody").append(data);
					if(confirm("Se agrego el alumno correctamente")){
						
					}
				}
			}
		});
	}
}
</script>
<div id="search" class="form-style" style="margin-left:8%;">
	<h2>Busqueda de Alumno</h2>
	<ul>
		<li class="first">
			<p>
				<input type="text" id="search-text" class="ui-widget-content" placeholder="Introduce el rut a buscar..." size="60"/>
			</p>	
		</li>
		<li class="last">
			<p>
				<button id="find-child">Buscar</button>		
			</p>
		</li>
	</ul>
</div>
<table id="list-searching">
	<tbody>
		<tr>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Rut</td>
			<td>Opcion</td>
		</tr>
	</tbody>
</table>