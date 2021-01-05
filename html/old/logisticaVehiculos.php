<?php
      include('cabecera.php');

$query = mysqli_query($dbconn, 
"SELECT v.matricula, l.localizacion, v.tipoVehiculo, v.capacidad, v.pesoMaximoCarga, v.estado
FROM vehiculo v, localizarVehiculo l
WHERE v.matricula = l.matricula;"

)
            or die (mysqli_error($dbconn));

         while ($row = mysqli_fetch_array($query)) {
         echo
         "<tr>
        <td>{$row['matricula']}</td>
        <td>{$row['tipoVehiculo']}</td>
	<td>{$row['capacidad']}</td>
	<td>{$row['pesoMaximoCarga']}</td>
	<td>{$row['localizacion']}</td>
	<td>{$row['estado']}</td>
         </tr>";
         }

         mysqli_close($dbconn);


?>