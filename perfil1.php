<?php
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';

?>
<?php
session_start();
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

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        
    </head>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
   
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    
    
    <link href="css/starrr.css" rel=stylesheet/>
    <script src="js/starrr.js"></script>
<div class="row">
<?php

     $sentencia=$pdo->prepare("SELECT * FROM users where ID=31");
        $sentencia->execute();
    $listaperfiles=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($listaProductos);print_r($perfil);
?>
<?php foreach($listaperfiles as $perfil){ ?>
    <div class="col-4">

         <div class="card">
             <img 
             class="card-img-top" 
             src="<?php echo $perfil['avatar'];?>"
             data-toggle="popover"
             data-trigger="hover"
             data-content="<?php echo $perfil['Informacion'];?>"
            height="317px"

             > 
             <div class="card-body">
             <h4>Usuario</h4>
                 <span><?php echo $perfil['Name'];?></span>
                 <p><a href='edit-profile.php'>Editar Perfil</a></p>	
             </div>
         </div>
         </div>

         <div class="col-lg-6">
    <h4>Correo</h4>
    <p><?php echo $perfil['Email'] ?></p>
    <h4>Informacion</h4>
    <p><?php echo $perfil['Informacion'] ?></p>
    <h4>Dirrecion </h4>
    <p><?php echo $perfil['Dirrecion'] ?></p>
    
         <?php }?>

         <script> 

$(function () {
  $('[data-toggle="popover"]').popover()
})


</script> 
<script>
   $('#Estrellas').starrr({
       rating:3,
       change:function(e,valor){
           alert(valor);
           
       }
       
   });
    
    </script>
<script src="js/directive.js"></script>
    
<?php include 'templates/pie.php'; ?>