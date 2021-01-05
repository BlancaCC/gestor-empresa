<?php
	include('cabecera.php');
	if(isset($_POST['submit']))
	{

		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];

		$nombre = $_POST['nombre'];

		// buscamos si no se ha declarado antes esa dirección o ese número de telefono
		$sql = "INSERT INTO centro( direccion, telefono, nombre)
VALUES ('$direccion', '$telefono', '$nombre');";

               if (mysqli_query($dbconn, $sql)) 
		{
			echo "¡Nuevo centro guardado , recarga para ver !";
		} 
		else 
		{
			echo "Error: " . $sql . "" . mysqli_error($dbconn);
		} 

	mysqli_close($dbconn);
	} // fin botón 

?>