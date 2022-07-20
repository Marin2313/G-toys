
<?php
include 'templates/cabecera.php';

session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Edita tu perfil</title>
	
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>
  
  <body>      
    <?php
    if (isset($_SESSION['loggedin'])) {  
    }
    else {
        echo "<div class='alert alert-danger mt-4' role='alert'>
        <h4>Necesitas estar logueado para acceder a esta pagina.</h4>
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
				<h3 style="text-align:center">Editar tu perfil</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="guardarperfil.php" enctype="multipart/form-data" autocomplete="off">
				<div class="form-group">
					<label for="nombre" class="col-sm-2 control-label">Nombre</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
					</div>
				</div>
			
				
				<div class="form-group">
					<label for="informacion" class="col-sm-2 control-label">Informacion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="informacion" name="informacion" placeholder="Informacion">
					</div>
				</div>

				<div class="form-group">
					<label for="dirrecion" class="col-sm-2 control-label">Dirrecion</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dirrecion" name="dirrecion" placeholder="Direccion">
					</div>
				</div>


				<div class="form-group">
					<label for="imagen" class="col-sm-2 control-label">Foto de perfil</label>
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


