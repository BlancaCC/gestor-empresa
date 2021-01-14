<?php
	include('cabecera.php');

    // la inserción de empleado se divide en dos fases, (1)insercción en  tabla Empleado y (2) insercción en grupo, si es que la tiene

    // -- lectura datos formulario ---

        // variables no nulas
		$Nombre = $_POST['Nombre'];
		$Correo = $_POST['Correo'];
    $DNI = $_POST['DNI'];
		$Fecha = $_POST['Fecha'];

        //pueden estar nulas
		$Publicidad = $_POST['Publicidad'];
		$CuentaBancaria = $_POST['CuentaBancaria'];


// -----

    $return =""; // variable de mensaje con la información



    // (1) INSERCIÓN EN TABLA CLIENTE
    	$sql = "INSERT INTO Cliente (Nombre, Correo, DNI, Fecha, Publicidad, CuentaBancaria)
    				VALUES ('$Nombre', '$Correo', '$DNI', '$Fecha', '$Publicidad', '$CuentaBancaria');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo cliente guardado con éxito.";

    	}
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }



    /*// (2) INSERCCIÓN DE LA PerteneceGrupo

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
*/
    echo $return;

    mysqli_close($dbconn);

 ?>
