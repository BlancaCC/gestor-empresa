<?php
      include('cabecera.php');

     $idComp = $_POST['idComp'];
     $return="";
     $sql .= "SELECT * FROM componente WHERE idComp='$idComp';";

     $query = mysqli_query($dbconn,$sql)
      or die (mysqli_error($dbconn));

     $return .= "<h4>Componente: </h4> ";

     $return .=
         "<table><tr>
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
    $return .= "</table>";

    $sql = "SELECT * FROM estanteria WHERE idEstanteria IN (
      SELECT idEstanteria FROM almacenadoEn WHERE idComp='$idComp')";

    $query = mysqli_query($dbconn,$sql)
     or die (mysqli_error($dbconn));

     $return .= "<br> <h4> Almacenado en estanterías: </h4> ";

     $return .=
         "<table><tr>
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

    $return .= "</table>";

    echo $return;

     mysqli_close($dbconn);



?>
