<?php
	include('cabecera.php');

		$nombre = $_POST['nombre'];
    $cantidad = $_POST['cantidad'];
		$lote = $_POST['lote'];
    $estado = $_POST['estado'];

		if(!preg_match("/\A[0-9]*\z/",$cantidad))
		{
			echo "Introducir un valor numérico en cantidad";
		}
		else
		{
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
		}


	  mysqli_close($dbconn);

?>
