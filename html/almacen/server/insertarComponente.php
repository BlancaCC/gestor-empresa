<?php
	include('cabecera.php');

		$nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
		$lote = $_POST['lote'];
    $estado = $_POST['estado'];


		// buscamos si no se ha declarado antes esa dirección o ese número de telefono
		$sql = "INSERT INTO componente( nombre,cantidad,lote,estado)
VALUES ('$nombre','$cantidad','$lote','$estado');";

               if (mysqli_query($dbconn, $sql))
		{

			echo "Nueva componente guardada";
		}
		else
		{
			echo "Error: " . $sql . "" . mysqli_error($dbconn);
		}


	mysqli_close($dbconn);

?>
