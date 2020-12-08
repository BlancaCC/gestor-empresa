<?php
      include('cabecera.php');

$query = mysqli_query($dbconn, "SELECT * FROM centro;")

            or die (mysqli_error($dbconn));

         while ($row = mysqli_fetch_array($query)) {
         echo
         "<tr>
        <td>{$row['direccion']}</td>
        <td>{$row['telefono']}</td>
	<td>{$row['nombre']}</td>
         </tr>";
         }

         mysqli_close($dbconn);


?>