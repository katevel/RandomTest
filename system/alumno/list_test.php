<?php
session_start();
include("../conexion.php");
$cn = conectar();
$query = mysql_query("SELECT
					  Prueba.idprueba, 
					  Prueba.nombre  
					FROM prueba Prueba
					WHERE Prueba.alumno_idalumno = ".@$_SESSION['user_id']."
					    AND Prueba.estado = 'ACTIVA'");
while($row = mysql_fetch_assoc($query)){
	$pruebas[] = $row;
}

?>
<script type="text/javascript">
$(document).ready(function(){
	$(".resolve").live('click', function(e){
		var id = $(this).attr("data-id");
		$.ajax({
			url:"resolver.php?idprueba="+id,
			dataType:"html", type:"POST",
			success: function(data){
				$("#content-system").html("");   
	            $('#content-system').html(data).show('slow');
			}
		});
	});
	
});
</script>
<div class="form-style">
	<h2>Lista de Pruebas pendientes</h2>
	<ul>
		<? foreach($pruebas as $prueba){?>
		<li>
			<?=$prueba['nombre']?> <button class="resolve" data-id="<?=$prueba['idprueba']?>">Resolver</button>
		</li>
		<?}?>
	</ul>
</div>
