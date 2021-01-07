<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * FROM componente;"

    )

            or die (mysqli_error($dbconn));


     $return =
         "<tr>
         <td><b>id</b></td>
         <td><b>Nombre</b></td>
         <td><b>Cantidad</b></td>
         <td><b>Lote</b></td>
         <td><b>Estado</b></td>

         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['idComp']}</td>
<td> {$row['nombre']}</td>
<td> {$row['cantidad']}</td>
<td> {$row['lote']}</td>
<td> {$row['estado']}</td>
</tr>"
    ;
    }

    echo $return;

     mysqli_close($dbconn);



?>
