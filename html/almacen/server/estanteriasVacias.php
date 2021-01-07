<?php
      include('cabecera.php');

     $query = mysqli_query($dbconn,


    "SELECT * from estanteria where idEstanteria not in
      (select idEstanteria from estanteria natural join almacenadoEn);"

    )

            or die (mysqli_error($dbconn));


     $return =
         "<tr>
         <td><b>id</b></td>
         <td><b>Centro</td>
         <td><b>Zona</b></td>
         <td><b>Alto</b></td>
         <td><b>Ancho</b></td>
         <td><b>Largo</b></td>
         </tr>";


    while ($row = mysqli_fetch_array($query)) {

    $return .= "<tr>
<td> {$row['idEstanteria']}</td>
<td> {$row['dirCentro']}</td>
<td> {$row['zona']}</td>
<td> {$row['alto']}</td>
<td> {$row['ancho']}</td>
<td> {$row['largo']}</td>
</tr>"
    ;
    }

    echo $return;

     mysqli_close($dbconn);



?>
