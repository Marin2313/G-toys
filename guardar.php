<?php
	require 'conexx.php';
	

    $nombre = $_POST['nombre'];
	$precio = $_POST['precio'];
	$descripcion = $_POST['descripcion'];
	$detalles = $_POST['detalles'];
	$imagen= $_POST['imagen'];
	$cantidad= $_POST['cantidad'];
	

 

	
	 
	$query = "INSERT INTO tblproductos (Nombre, Precio, Descripcion,Detalles,Cantidad,Imagen,IDVENDEDOR) VALUES ('$nombre', '$precio', '$descripcion','$detalles','$cantidad','$imagen','31')";
	$resultado = $mysqli->query($query);
	$id_insert = $mysqli->insert_id;

	
	
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
						<h3>Producto Guardado</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>


			