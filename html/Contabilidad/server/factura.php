<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM Factura;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td> Id </td>
        <td>Fecha</td>
        <td> DNI_proveedor </td>
        <td> DNI_comprador </td>
        <td> Descripcion </td>
        <td> Importe </td>
        <td> Tipo </td>


         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['Id']}</td>
<td> {$row['Fecha']}</td>
<td> {$row['DNI_proveedor']}</td>
<td> {$row['DNI_comprador']}</td>
<td> {$row['Descripcion']}</td>
<td> {$row['Importe']}</td>
<td> {$row['Tipo']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>