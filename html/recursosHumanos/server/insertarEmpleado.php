<?php
	include('cabecera.php');

    // la inserción de empleado se divide en dos fases, (1)insercción en  tabla Empleado y (2) insercción en grupo, si es que la tiene

    // -- lectura datos formulario ---

        // variables no nulas 
		$dni = $_POST['dni'];
		$nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
	$direccionCentro = $_POST['direccionCentro'];

        //pueden estar nulas
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$cuentaBancaria = $_POST['cuentaBancaria'];
		
    
// -----
    
    $return =""; // variable de mensaje con la información 


    
    // (1) INSERCIÓN EN TABLA VEHÍCULO   
    	$sql = "INSERT INTO Empleado (dni, nombre, apellidos, telefono, direccion,cuentaBancaria, direccionCentro)
    				VALUES ('$dni', '$nombre', '$apellidos', '$telefono', '$direccion', '$cuentaBancaria','$direccionCentro');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo empleado guardado con éxito.";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }



    // (2) INSERCCIÓN DE LA PerteneceGrupo

    if(!empty($_POST['nombre_grupo'])) {
    	
		$grupo = $_POST['nombre_grupo'];

		$sql = "INSERT INTO perteneceEmpleado (nombre, dni)
							VALUES ('$grupo','$dni');";

		if (mysqli_query($dbconn, $sql)) {
			$return .= "Empleado añadido al grupo";
                        
		} 
		else {
			$return .= "Error: " . $sql . " " . mysqli_error($dbconn);
                        
			}
	}

    echo $return;

    mysqli_close($dbconn);

 ?>
           
