<?php 
	$host = "localhost";
	$user = "root"; 
	$pass = "";
	$db = "d7";
	$conexion = mysqli_connect($host, $user,$pass, $db);
	if (mysqli_connect_error()) {
		die("Error de conexion a MySQL: ".mysqli_connect_error())." ".mysqli_connect_errno();
	}
?>