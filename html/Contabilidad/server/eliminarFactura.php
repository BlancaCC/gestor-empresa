<?php


include('cabecera.php');

	$return =""; // variable de mensaje con la información 

	$Id_eliminar = $_POST['Id_eliminar'];

		//comprobación de que el empleado existe
		$query = mysqli_query($dbconn, "SELECT * FROM Factura where Id='$Id_eliminar';")
	
				or die (mysqli_error($dbconn));
	
		 $vacio = true;
		if ($row = mysqli_fetch_array($query)) {
				$vacio = false;
			 }
		
		// (1) Eliminacion del empleado  
		
		$sql = "DELETE FROM Cobrar WHERE Id = '$Id_eliminar'; ";
	
			mysqli_query($dbconn, $sql);
	
	
		$sql = "DELETE FROM CalcularBeneficio WHERE Id = '$Id_eliminar';";
			
			mysqli_query($dbconn, $sql);
	
		$sql = "DELETE FROM Factura WHERE Id = '$Id_eliminar';";
	
		
			if (mysqli_query($dbconn, $sql)) {
				$return .=  "Factura eliminada con éxito.";
						
			} 
			else {
				$return .= "Error al eliminar Factura. El código de error: " . $sql . "" . mysqli_error($dbconn);
			
			 }
			 
		if ($vacio)
			 $return = "No existe la factura a borrar ";
			
		echo $return;
	
		mysqli_close($dbconn);
 ?>