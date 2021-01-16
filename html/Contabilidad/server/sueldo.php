<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "select DNI,nombre,apellidos,Cantidad,CuentaBancaria from (select Codigo, Recibir.DNI, nombre, apellidos from Recibir inner join Empleado on Recibir.DNI=Empleado.DNI) a inner join Sueldo on a.Codigo=Sueldo.Codigo;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td> DNI </td>
        <td> Nombre </td>
        <td> Apellidos </td>
        <td> Cantidad </td>
        <td> Cuenta Bancaria </td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['DNI']}</td>
<td> {$row['nombre']}</td>
<td> {$row['apellidos']}</td>
<td> {$row['Cantidad']}</td>
<td> {$row['CuentaBancaria']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>