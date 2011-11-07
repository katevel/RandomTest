<?
include("config.php");

function conectar(){
		
		$db_con = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die("Error al Conectar con el servidor");
		if(!$db_con) return false;
		if(!mysql_select_db(DB_DATA,$db_con) ) return false;
		return $db_con;	
}

?>