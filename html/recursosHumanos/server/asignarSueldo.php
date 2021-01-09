<?php
	include('cabecera.php');

   

    // -- lectura datos formulario ---

        // variables no nulas 
		$codigo = $_POST['codigo'];
		$dni = $_POST['dni'];
       

		
    
// -----
    
    $return =""; // variable de mensaje con la información 


    
    // (1) INSERCIÓN EN TABLA VEHÍCULO   
    	$sql = "INSERT INTO Recibir (codigo, dni)
    				VALUES ('$codigo', '$dni');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo salario asignado con exito.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
		
         }



    

    echo $return;

    mysqli_close($dbconn);

 ?>
           
