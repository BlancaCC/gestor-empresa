<?php
	include('cabecera.php');

    // la inserción de empleado se divide en dos fases, (1)insercción en  tabla Empleado y (2) insercción en grupo, si es que la tiene

    // -- lectura datos formulario ---

        // variables no nulas
		$Nombre = $_POST['Nombre'];
		$Correo = $_POST['Correo'];
        $DNI = $_POST['DNI'];
		$Publicidad = $_POST['Publicidad'];
        $Fecha = $_POST['Fecha'];
		$CuentaBancaria = $_POST['CuentaBancaria'];


    //  --- comprobación fecha en buen formato ---

    if (!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/", $Fecha) ) {
        echo "Insercción fallida, formato fecha inválido, debe ser yyyy-mm-dd";
    return 0;
    }
// -----

    $return =""; // variable de mensaje con la información



    // (1) INSERCIÓN EN TABLA CLIENTE
    	$sql = "INSERT INTO Cliente (Nombre, Correo, DNI, Publicidad, Fecha, CuentaBancaria)
    				VALUES ('$Nombre', '$Correo', '$DNI', '$Publicidad', '$Fecha', '$CuentaBancaria');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo cliente guardado con éxito.";

    	}
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }



   /* // (2) INSERCCIÓN DE LA GrupoCliente

    if(!empty($_POST['nombre_grupo'])) {

		$grupo = $_POST['nombre_grupo'];

		$sql = "INSERT INTO GrupoCliente (nombre, dni)
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
