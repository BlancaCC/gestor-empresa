 <?php

include('cabecera.php');

$return =""; // variable de mensaje con la información 

$dni_eliminar = $_POST['dni_eliminar'];

    
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
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
		
         }


    echo $return;

    mysqli_close($dbconn);

 ?>
