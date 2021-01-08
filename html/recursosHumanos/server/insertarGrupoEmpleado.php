<?php
	include('cabecera.php');

    

    // -- lectura datos formulario ---

        // variables no nulas 
		$nombre = $_POST['nombre'];	
		$dni = $_POST['dni'];
	
		
    
// -----
    
    $return =""; // variable de mensaje con la información 


    
    // (1) INSERCIÓN EN TABLA perteneceEmpleado
    	$sql = "INSERT INTO perteneceEmpleado (nombre, dni)
    				VALUES ('$nombre','$dni');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo empleado añadido al grupo.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }





    echo $return;

    mysqli_close($dbconn);

 ?>
           
