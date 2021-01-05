<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM Empleado;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td>DNI</td>
        <td>Nombre</td>
	<td>Apellidos</td>
	<td>Telefono</td>
        <td>Direccion</td>
	<td>DireccionCentro</td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['dni']}</td>
<td> {$row['nombre']}</td>
<td> {$row['apellidos']}</td>
<td> {$row['telefono']}</td>
<td> {$row['direccion']}</td>
<td> {$row['direccionCentro']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>
