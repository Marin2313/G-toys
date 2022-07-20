<?php
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';

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
if($_POST){
    $IDVENDEDOR=openssl_decrypt($_POST['IDVENDEDOR'],COD,KEY);

    $sentencia=$pdo->prepare("SELECT * FROM users where id='31'");
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
                 <span> <?php echo $perfil['Name'];?></span>
             </div>
         </div>
         </div>

         <div class="col-lg-6">
    <h4>Correo de contacto</h4>
    <p><?php echo $perfil['Email'] ?></p>
    <h4>Informacion</h4>
    <p><?php echo $perfil['Informacion'] ?></p>

    </p>
            <hr/>
            Reputacion: <span id="Estrellas"></span>
            <hr/>
            <p>
    
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
    
<?php } include 'templates/pie.php'; ?>