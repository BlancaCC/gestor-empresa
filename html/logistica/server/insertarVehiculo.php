<?php
	include('cabecera.php');

    // la inserción de vehículo se divide en dos fases, (1)insercción en  tabla vehículos y (2) insercción en localización, si es que la tiene

    // -- lectura datos formulario ---

        // variables no nulas 
		$matricula = $_POST['matricula'];
		$tipo = $_POST['tipo'];
        $capacidad = $_POST['capacidad'];

        //pueden estar nulas
		$peso_maximo = $_POST['pesomaximo'];
		$estado = $_POST['estado'];
    
// -----
    
    $return =""; // variable de mensaje con la información 
    $inserccion = True;

    
    // (1) INSERCIÓN EN TABLA VEHÍCULO   
    	$sql = "INSERT INTO vehiculo (matricula, tipoVehiculo, capacidad,pesoMaximoCarga, estado)
    				VALUES ('$matricula', '$tipo', $capacidad, $peso_maximo, '$estado');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo vehículo guardado con éxito.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
            $inserccion = False; 
         }



    // (2) INSERCCIÓN DE LA LOCALIZAR-VEHICULO 

    if(!empty($_POST['localizacion']) && $inserccion == True) {
    	
		$localizacion = $_POST['localizacion'];

		$sql = "INSERT INTO localizarVehiculo (matricula, localizacion)
							VALUES ('$matricula','$localizacion');";

		if (mysqli_query($dbconn, $sql)) {
			$return .= "Localización añadida!";
                        
		} 
		else {
			$return .= "Error: " . $sql . " " . mysqli_error($dbconn);
                        
			}
	}

    echo $return;

    mysqli_close($dbconn);

 ?>
           