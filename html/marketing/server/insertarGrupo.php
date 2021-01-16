<?php
	include('cabecera.php');

    

    // -- lectura datos formulario ---

        // variables no nulas 
		$nombreGrupo = $_POST['nombreGrupo'];
	
		
    
// -----
    
    $return =""; // variable de mensaje con la información 


    
    // (1) INSERCIÓN EN TABLA Grupo   
    	$sql = "INSERT INTO Grupo (nombreGrupo)
    				VALUES ('$nombreGrupo');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo grupo guardado con éxito.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }


    echo $return;

    mysqli_close($dbconn);

 ?>
           
