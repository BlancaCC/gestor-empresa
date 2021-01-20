 <?php

include('cabecera.php');

  
        

$return =""; // variable de mensaje con la información 

$dni_eliminar = $_POST['dni_eliminar'];

	//comprobación de que el empleado existe
	$query = mysqli_query($dbconn, "SELECT * FROM Empleado where dni='$dni_eliminar';")

            or die (mysqli_error($dbconn));

	 $vacio = true;
	if ($row = mysqli_fetch_array($query)) {
            $vacio = false;
         }
    
    // (1) Eliminacion del empleado  
	
	$sql = "DELETE FROM Recibir WHERE dni = '$dni_eliminar'; ";

	    mysqli_query($dbconn, $sql);


	$sql = "DELETE FROM perteneceEmpleado WHERE dni = '$dni_eliminar';";
		
    	mysqli_query($dbconn, $sql);

	$sql = "DELETE FROM Empleado WHERE dni = '$dni_eliminar';";

	
    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Empleado eliminado con éxito.";
                    
    	} 
    	else {
    		$return .= "Error al eliminar empleado. El código de error: " . $sql . "" . mysqli_error($dbconn);
		
         }
	if ($vacio)
		 $return = "No existe el empleado a borrar";

    echo $return;

    mysqli_close($dbconn);

 ?>
