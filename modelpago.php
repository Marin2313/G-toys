<?php
include 'database.php';
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
?>
<?php

class Model extends Database{
    
    
    function getAll(){
     if($_POST){
            $ID=openssl_decrypt($_POST['id'],COD,KEY);
        $detalleventa = array();
        $detalleventa['items'] = array();
        $query = $this->connect()->query("SELECT * FROM tbbproductos WHERE ID =:ID");
         while($row = $query->fetch()){
            array_push($detalleventa['items'], array(
                'Nombre' => $row['Nombre'],
                'Precio' => $row['Precio'],
                'Descripcion' => $row['Descripcion'],
                //'Correo' => $row['Correo'],
            ));
        }
        return $detalleventa;
    }
}
}?>