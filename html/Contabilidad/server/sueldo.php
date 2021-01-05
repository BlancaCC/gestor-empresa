<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM Sueldo;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td> Codigo </td>
        <td> Cantidad </td>
        <td> Cuenta Bancaria </td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['Codigo']}</td>
<td> {$row['Cantidad']}</td>
<td> {$row['CuentaBancaria']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>