<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "Select DNI,Importe,CuentaBancaria,Descripcion from (Select Cobrar.Id,Cobrar.DNI,Cliente.CuentaBancaria from Cobrar inner join Cliente on Cobrar.DNI=Cliente.DNI where Pendiente='Si') a inner join Factura on a.Id=Factura.Id;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td>DNI </td>
        <td>Importe</td>
        <td>Cuenta Bancaria </td>
        <td>Descripcion </td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['DNI']}</td>
<td> {$row['Importe']}</td>
<td> {$row['CuentaBancaria']}</td>
<td> {$row['Descripcion']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>