<?php
      include('cabecera.php');

        $query = mysqli_query($dbconn, "SELECT * FROM centro;")

            or die (mysqli_error($dbconn));


         $return = 
         "<tr>
        <td> Direccion </td>
        <td>Telefono</td>
	<td> Nombre </td>
         </tr>";

    
         while ($row = mysqli_fetch_array($query)) {
         $return .= 
         "<tr>
        <td>{$row['direccion']}</td>
        <td>{$row['telefono']}</td>
	<td>{$row['nombre']}</td>
         </tr>";
         }


    
        echo $return;
         mysqli_close($dbconn);


?>