<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM Cobrar;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td> Pendiente </td>
        <td>Fecha</td>
        <td> DNI </td>
        <td> Id </td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['Pendiente']}</td>
<td> {$row['Fecha']}</td>
<td> {$row['DNI']}</td>
<td> {$row['Id']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>