<?php
	
	$mysqli = new mysqli('localhost', 'root', '', 'tienda');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>