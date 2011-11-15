<?php

$nombre = $_GET['name'];
$apellido = $_GET['apellido'];

echo json_encode(array("status"=>"OK", "msg"=>$nombre." ".$apellido));
?>
