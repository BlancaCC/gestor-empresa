<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT p.nombre, e.nombre, e.apellidos FROM perteneceEmpleado p, Empleado e WHERE p.dni = e.dni;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td>Nombre Grupo</td>
	<td>Nombre</td>
	<td>Apellidos</td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row[0]}</td>
<td> {$row[1]}</td>
<td> {$row['apellidos']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>
