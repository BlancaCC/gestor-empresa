<?php
    
    include('cabecera.php');
    $sql = $_POST['order'];


    if (mysqli_query($dbconn, $sql)) {
    	  $return .=  "Modificación de la factura con éxito";
                        
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }
        echo $return;
         mysqli_close($dbconn);


?>