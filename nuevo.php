<?php
session_start();
?>
<?php
include 'templates/cabecera.php';
?>
<?php
    if (isset($_SESSION['loggedin'])) {  
    }
    else {
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Necesitas acceder para entrar a esta pagina</h4>
        <p><a href='login.php'>Inicia sesion aqui!</a></p></div>";
        exit;
    }
    // checking the time now when check-login.php page starts
    $now = time();           
    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Tu sesion a expirado!</h4>
        <p><a href='login.php'>Inicia sesion aqui!</a></p></div>";
        exit;
        }
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
				<h3 style="text-align:center">NUEVO PRODUCTO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardar.php" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="precio" class="col-sm-2 control-label">Precio</label>
					<div class="col-sm-10">
						<input type="numeric" class="form-control" id="precio" name="precio" placeholder="Precio" required>
					</div>
				</div>
				
				<div class="form-group">
					<label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">
					</div>
				</div>

				<div class="form-group">
					<label for="detalles" class="col-sm-2 control-label">Detalles o informacion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="detalles" name="detalles" placeholder="Detalles">
					</div>
				</div>

				<div class="form-group">
					<label for="cantidad" class="col-sm-2 control-label">Cantidad a vender</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad">
					</div>
				</div>

				<div class="form-group">
					<label for="imagen" class="col-sm-2 control-label">Imagen link</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="imagen" name="imagen" placeholder="imagen">
					</div>
				</div> 

				
				
	
				
				
				<!--- 
				<div class="form-group" form action ="prueba.php"  enctype="multipart/form-data" method="post">
					<label for="imagen"  class="col-sm-2 control-label"> Imagen:</label>
					<div class="col-sm-10">
					<input class="form-control" id="imagen" name="imagen" size="30" type="file" /> --->


				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>

<?php include 'templates/pie.php'; ?>