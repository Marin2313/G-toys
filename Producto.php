<?php
include 'global/config.php';
include 'global/conexion.php';
include 'templates/cabecera.php';
include 'carrito.php';

?>
<body>
</html>
<br/>
     <?php
      if($mensaje!=""){?>
     <div class="alert alert-success" role="alert">
     <?php echo $mensaje; ?>
        
        <a href="mostrarCarrito.php" class="badge badge-success">Ver carrito</a>
    </div>
     <?php } ?>
 
    <div class="row">
<?php 
if($_POST){
    $ID=openssl_decrypt($_POST['id'],COD,KEY);
     
$sentencia=$pdo->prepare("SELECT * FROM tblproductos 
WHERE ID=:ID");
$sentencia->bindParam(":ID",$ID);
     $sentencia->execute();
     $listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaProductos as $producto){ ?>
    <div class="col-sm-3">
         <div class="zoom"> 
             <img 
             title="<?php echo $producto['Nombre'];?>"
             alt="<?php echo $producto['Nombre'];?>"
             class="card-img-top" 
             src="<?php echo $producto['Imagen'];?>"
             data-toggle="popover"
             data-trigger="hover"
             data-content="<?php echo $producto['Descripcion'];?>"
            height="317px" 
            src="https://picsum.photos/3000/1800/?random" alt="test1"> 
             <div class="card-body"> 
                 <span> <?php echo $producto['Nombre'];?></span>
                 <h5 class="card-title">$<?php echo $producto['Precio'];?></h5>



                 
                

                <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'],COD,KEY);?>">
                    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'],COD,KEY);?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                <button class="btn btn-primary" 
                name="btnAccion" 
                value="Agregar" 
                type="submit">
                Agregar al carrito
                                     </button>
                

                
</form> 
             </div>
             
         </div>
        </div>
        <div class="col-lg-6">
     <h4>Descripcion</h4>
     <p><?php echo $producto['Descripcion'] ?></p>
    <h4>Detalles</h4>
    <p><?php echo $producto['Detalles'] ?></p>

    </form> 
<form action="Perfil.php" method="post">
                    <input type="hidden" name="IDVENDEDOR" id="IDVENDEDOR" value="<?php echo openssl_encrypt($producto['IDVENDEDOR'],COD,KEY);?>">
                    <button class="btn btn-primary" 
                name="btnAccion" 
                value="Agregar" 
                type="submit">
                Vendedor
                                     </button>
                                     </form>
<form action="comentarios.php" method="post">
<button class="btn btn-success" type="submit">Unete a la conversacion</button>
</form>

        </div>

      
    </div> 
        
<?php }?>

</div>

<script> 

$(function () {
  $('[data-toggle="popover"]').popover()
})


</script> 

<script src="js/directive.js"></script>



<?php }?>


        <?php  include 'templates/pie.php'; ?>
