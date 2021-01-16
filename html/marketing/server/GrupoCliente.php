<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM GrupoCliente;"

    )

            or die (mysqli_error($dbconn));


     $return = 
         "<tr>
        <td> nombreGrupo </td>
        <td> DNI </td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['nombreGrupo']}</td>
<td> {$row['DNI']}</td>
</tr>"
    ;
    }


    echo $return;

     mysqli_close($dbconn);


    
?>
