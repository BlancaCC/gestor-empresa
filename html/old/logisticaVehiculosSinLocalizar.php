<?php
      include('cabecera.php');

$query = mysqli_query($dbconn, 
"select * from vehiculo where matricula not in (select matricula from localizarVehiculo);"

)
            or die (mysqli_error($dbconn));


	    if (mysqli_num_rows( $query ) == 0 ) {
	    echo " No hay ningún vehículo sin localizar ";
	    }
	    else
	    {
	    echo " <table>
        <tr>
        <th>Matricula</th>
        <th>TipoVehiculo</th>
	<th>Capacidad</th>
	<th>Peso máximo de la carga (x100kg)</th>
	<th> Estado </th>
        </tr>
";
         while ($row = mysqli_fetch_array($query)) {
         echo
         "<tr>
        <td>{$row['matricula']}</td>
        <td>{$row['tipoVehiculo']}</td>
	<td>{$row['capacidad']}</td>
	<td>{$row['pesoMaximoCarga']}</td>
	<td>{$row['estado']}</td>
         </tr>";
         }
	 
	 echo "</table>";
}
         mysqli_close($dbconn);


?>