<? 
session_start();
include("conexion.php");

$cn = conectar();

$user = $_POST["secret-user-name"];
$pass = $_POST["secret-password"];



if(empty($user) || empty($pass)){
	echo "<script>alert(\"Campos Vacios\");</script>";
	header("Location: ../index.php?error=empty");
	
}else{
	
	$query = mysql_query("SELECT * FROM profesor WHERE rut_profesor = '".$user."' AND password_profesor = '".$pass."'")or die(mysql_error());
	
	$enc = mysql_num_rows($query);
		
	if($enc == 1){
		$row = mysql_fetch_array($query);	

		session_register("user_id");
		session_register("user_name");
		session_register("user_type");
		session_start(); 
		$_SESSION[user_id] = $row[rut_profesor];
		$_SESSION[user_name] = $row[nombre_profesor]." ".$row[apePat_profesor];
		$_SESSION[user_type] = "Profesor";


		//TODO OK PERMITIR INGRESO
		header("Location: profesor/index.php");

	}else{

		$query = mysql_query("SELECT * FROM alumno WHERE rut_alumno = '".$user."' AND password_alumno = '".$pass."'")or die(mysql_error());
		$enc = mysql_num_rows($query);
				
	if($enc == 1){
			$row = mysql_fetch_array($query);	

			session_register("user_id");
			session_register("user_name");
			session_register("user_type");
			session_start(); 
			$_SESSION[user_id] = $row[rut_alumno];
			$_SESSION[user_name] = $row[nombre_alumno]." ".$row[apePat_alumno];
			$_SESSION[user_type] = "Alumno";
					
						//TODO OK PERMITIR INGRESO
						header("Location: alumno/index.php");
						
	}else{
							$query = mysql_query("SELECT * FROM administrador WHERE rut_admin = '".$user."' AND password_admin= '".$pass."'")or die(mysql_error());
			  				$enc = mysql_num_rows($query);
					
							if($enc == 1){
							$row = mysql_fetch_array($query);	

							session_register("user_id");
							session_register("user_name");
							session_register("user_type");
							session_start(); 
							$_SESSION[user_id] = $row[rut_admin];
							$_SESSION[user_name] = $row[nombre_admin]." ".$row[apePat_admin];
							$_SESSION[user_type] = "Admin";
							
							//TODO OK PERMITIR INGRESO
							header("Location: admin/index.php");
						
						}else{
							
							echo "<script>alert(\"Usuario o password incorrectos\");</script>";
						}
							
						}

	
	}

}
?>