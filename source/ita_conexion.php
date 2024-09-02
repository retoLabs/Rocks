<?php
/*
$db_host = "localhost";
$db_user = "adminITA";
$db_pass = "Rocks:23";
$db_name = "rocks";
*/
$db_host = "localhost";
$db_user = "adminGMC";
$db_pass = "GMCat:23";
$db_name = "gmcat";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'No se pudo conectar a la base de datos : '.mysqli_connect_error();
}
?>