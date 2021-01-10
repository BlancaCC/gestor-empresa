<?php
    
    include('cabecera.php');
    $sql = $_POST['order'];


    if (mysqli_query($dbconn, $sql)) {
    	  $return .=  "Modificación del vehículo con éxito";
                        
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }
        echo $resultado;
         mysqli_close($dbconn);


?>