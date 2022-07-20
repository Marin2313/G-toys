
<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "tienda";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM tblproductos WHERE Nombre NOT LIKE '' ORDER By Id_no LIMIT 25";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM tblproductos 
			WHERE Nombre LIKE '%$q%' OR Precio LIKE '%$q%' OR Descripcion LIKE '%$q%' OR Cantidad LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows > 0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    					<td>Nombre</td>
    					<td>Precio</td>
    					<td>Descripcion</td>
							<td>Cantidad</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['Nombre']."</td>
    					<td>".$fila['Precio']."</td>
    					<td>".$fila['Descripcion']."</td>
    					<td>".$fila['Cantidad']."</td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>