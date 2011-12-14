function cerrarSesion()
{
	if(confirm("Desea Salir del Sistema"))
	{
		 location.href = "../cerrar_session.php";
	}
}