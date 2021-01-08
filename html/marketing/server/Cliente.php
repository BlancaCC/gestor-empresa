<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM Cliente;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td> Nombre </td>
        <td> Correo </td>
        <td> DNI </td>
        <td> Publicidad </td>
        <td> Fecha </td>
        <td> CuentaBancaria </td>


         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['Nombre']}</td>
<td> {$row['Correo']}</td>
<td> {$row['DNI']}</td>
<td> {$row['Publicidad']}</td>
<td> {$row['Fecha']}</td>
<td> {$row['CuentaBancaria']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>
