<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'model.php';

$detalleventa = new Model();

$lista =$detalleventa->getAll();

$html  = '<img src="images/logo.png" width="300" />';
$html .= '<h1>Comprobante de compra</h1>';
$html .= '<table>
            <tr>
                <td>Nombre</td>
                <td>Precio</td>
                <td>Descripcion</td>

                
            </tr>';
foreach($lista['items'] as $item){
    $html .= '<tr>
                <td>'.$item['Nombre'].'</td><td>'.$item['Precio'].'</td><td>'.$item['Descripcion'].'</td>
              </tr>';
}
    $html .= '</table>';
    

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();


?>