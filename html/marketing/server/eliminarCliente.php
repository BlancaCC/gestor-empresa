 <?php

include('cabecera.php');

  
        

$return =""; // variable de mensaje con la información 

$DNI = $_POST['DNI'];

	//comprobación de que el cliente existe
	$query = mysqli_query($dbconn, "SELECT * FROM Cliente where DNI='$DNI';")

            or die (mysqli_error($dbconn));

	 $vacio = true;
	if ($row = mysqli_fetch_array($query)) {
            $vacio = false;
         }


    if ($vacio) {
		 $return = "No existe el cliente a borrar $DNI" ;

        echo $return;
    return ;
    }

    
    // (1) Eliminacion del cliente  


	$sql = "DELETE FROM perteneceCliente WHERE DNI = '$DNI';";
		
    	mysqli_query($dbconn, $sql);

	$sql = "DELETE FROM Cliente WHERE DNI = '$DNI';";

	
    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Cliente eliminado con éxito.";
                    
    	} 
    	else {
    		$return .= "Error al eliminar cliente. El código de error: " . $sql . "" . mysqli_error($dbconn);
		
         }
	

    echo $return;
    mysqli_close($dbconn);

 ?>
