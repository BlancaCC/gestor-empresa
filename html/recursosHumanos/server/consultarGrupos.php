<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM grupoEmpleados;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td>nombre</td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['nombre']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>
