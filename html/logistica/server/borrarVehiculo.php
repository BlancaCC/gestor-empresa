<?php
	include('cabecera.php');


    
  $matricula = $_POST['matricula'];


     $sql = "DELETE FROM localizarVehiculo
        WHERE matricula = '$matricula';";

    mysqli_query($dbconn, $sql); // si da un error me da igual, porque puede que sea de localización, y si no lo es será ese mismo error se manifestará en la siguiente consulta que eso ya sí controlamos (solución fea, pero...)

    
    
    
		$sql =  "DELETE FROM vehiculo
        WHERE matricula = '$matricula';";
          if (mysqli_query($dbconn, $sql)) 
    		{
    			$return =  "Vehiculo borrado con éxito";
    		} 
    		else 
    		{
    			$return =  "Error: " . $sql . "" . mysqli_error($dbconn);
    		} 

    echo $return;   
	mysqli_close($dbconn);
	
?>
