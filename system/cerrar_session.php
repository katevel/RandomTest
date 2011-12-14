<?php
//INICIA SESION
session_start();
//INCLUYE CONECCION
//DESTRUYO LA SESSION
session_unset();
session_destroy();

header("Location: ../index.php");

?>