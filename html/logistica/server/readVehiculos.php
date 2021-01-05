<?php
      include('cabecera.php');

$query = mysqli_query($dbconn, 
"SELECT v.matricula, l.localizacion, v.tipoVehiculo, v.capacidad, v.pesoMaximoCarga, v.estado
FROM vehiculo v, localizarVehiculo l
WHERE v.matricula = l.matricula;"

)
            or die (mysqli_error($dbconn));


    $resultado = "<tr>
        <td>Matricula</td>
        <td> TipoVehiculo</td>
	<td>Capacidad</td>
	<td> PesoMaximoCarga </td>
	<td> Localizacion</td>
	<td> Estado </td>
         </tr>";

    
         while ($row = mysqli_fetch_array($query)) {
         $resultado .= 
         "<tr>
        <td>{$row['matricula']}</td>
        <td>{$row['tipoVehiculo']}</td>
	<td>{$row['capacidad']}</td>
	<td>{$row['pesoMaximoCarga']}</td>
	<td>{$row['localizacion']}</td>
	<td>{$row['estado']}</td>
         </tr>";
         }

        echo $resultado;
         mysqli_close($dbconn);


?>