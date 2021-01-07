<?php
	include('cabecera.php');

    

    // -- lectura datos formulario ---

        // variables no nulas 
		$nombre = $_POST['nombre'];
	
		
    
// -----
    
    $return =""; // variable de mensaje con la información 


    
    // (1) INSERCIÓN EN TABLA Grupo   
    	$sql = "INSERT INTO grupoEmpleados (nombre)
    				VALUES ('$nombre');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo grupo guardado con éxito.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }



    // (2) INSERCCIÓN DE LA PerteneceGrupo


    echo $return;

    mysqli_close($dbconn);

 ?>
           
