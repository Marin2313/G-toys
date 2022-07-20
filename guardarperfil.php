<?php
require 'conexx.php';
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';

	

    $nombre = $_POST['nombre'];
	$informacion = $_POST['informacion'];
	$dirrecion = $_POST['dirrecion'];
	$imagen= $_POST['imagen'];
	
	
    $query= "UPDATE 'users' SET Name=$nombre ,Informacion = $informacion, Dirrecion = $dirrecion,avatar = $imagen
    where ID=31";
    $resultado = $mysqli->query($query);

	
	
?> 


<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>Perfil Guardado</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="perfil1.php" class="btn btn-primary">Ver Perfil</a>
					
				</div>
			</div>
		</div>
	</body>
</html>
