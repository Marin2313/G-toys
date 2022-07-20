<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once 'model.php';

$detalleventa = new Model();

$lista =$detalleventa->getAll();

$html  = '<img src="images/logo.png" width="200" />';
$html .= '<h1>Datos para el deposito</h1>';
$html .= '<table>
<thead>
            <tr>
                <td>Numero de cuenta</td>
                <td>Numero de trasnferencia</td>

                </tr>';
                $html .= '<tr>
                <td> 10280290730</td>
                <td>1378881028029070307</td>
              </tr>';
              
    $html .= '</table>';
    
    

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();


?>