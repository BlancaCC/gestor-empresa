 <?php

include('cabecera.php');

$return =""; // variable de mensaje con la información 

$dni_eliminar = $_POST['dni_eliminar'];

    
    // (1) Eliminacion del empleado  
	
	$SQL .= "DELETE FROM Empleado WHERE dni = '$dni_eliminar';";
    	
	
    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Empleado eliminado con éxito.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }


    echo $return;

    mysqli_close($dbconn);

 ?>
