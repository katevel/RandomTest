<?php
require("../conexion.php");
$cn = conectar();

?>
<script type="text/javascript" src="../js/jqueryui/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="../js/jqueryui/js/jquery-ui-1.8.16.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/modal.css" />
<link rel="stylesheet" type="text/css" href="../js/jqueryui/css/smoothness/jquery-ui-1.8.16.custom.css" />
<script type="text/javascript">
	$("#find-child").click(function(e){
		
	});
	$("#search-text").autocomplete({
		source: function( request, response ) {
				$.ajax({
					url: "http://ws.geonames.org/searchJSON",
					dataType: "jsonp",
					data: {
						featureClass: "P",
						style: "full",
						maxRows: 12,
						name_startsWith: request.term
					},
					success: function( data ) {
						response( $.map( data.geonames, function( item ) {
							return {
								label: item.name + (item.adminName1 ? ", " + item.adminName1 : "") + ", " + item.countryName,
								value: item.name
							}
						}));
					}
				});
			},
			minLength: 2,
			select: function( event, ui ) {
				log( ui.item ?
					"Selected: " + ui.item.label :
					"Nothing selected, input was " + this.value);
			},
			open: function() {
				$( this ).removeClass( "ui-corner-all" ).addClass( "ui-corner-top" );
			},
			close: function() {
				$( this ).removeClass( "ui-corner-top" ).addClass( "ui-corner-all" );
			}
	});
</script>
<div id="search">
	<input type="text" id="search-text" class="ui-widget-content" placeholder="Introduce el nombre a buscar..." size="60"/>
	<button type="button" id="find-child">Buscar</button>
</div>
<table id="list-searching">
	<tbody>
		<th>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Rut</td>
			<td>Opcion</td>
		</th>
	</tbody>
</table>
