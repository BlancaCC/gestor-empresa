<?php
	include('cabecera.php');

    

    // -- lectura datos formulario ---

        // variables no nulas 
		$nombreGrupo = $_POST['nombreGrupo'];	
		$DNI = $_POST['DNI'];
	
		
    
// -----
    
    $return =""; // variable de mensaje con la información 


    
    // (1) INSERCIÓN EN TABLA perteneceCliente
    	$sql = "INSERT INTO perteneceCliente (nombreGrupo, DNI)
    				VALUES ('$nombreGrupo','$DNI');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo empleado añadido al grupo.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }



    echo $return;

    mysqli_close($dbconn);

 ?>
           
