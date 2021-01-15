<?php
	include('cabecera.php');

    // la inserción de empleado se divide en dos fases, (1)insercción en  tabla Empleado y (2) insercción en grupo, si es que la tiene

    // -- lectura datos formulario ---

        // variables no nulas 
		$Id = $_POST['Id'];
		$fecha = $_POST['fecha'];
        $DNI_proveedor = $_POST['DNI_proveedor'];
	    $DNI_comprador = $_POST['DNI_comprador'];
		$descripcion = $_POST['descripcion'];
		$importe = $_POST['importe'];
		$tipo = $_POST['tipo'];
    
// -----
    
    $return =""; // variable de mensaje con la información 


    
    // (1) INSERCIÓN EN TABLA FACTURA   
    	$sql = "INSERT INTO Factura (Id, fecha, DNI_proveedor, DNI_comprador, descripcion, importe, tipo)
    				VALUES ('$Id', '$fecha', '$DNI_proveedor', '$DNI_comprador', '$descripcion', $importe,'$tipo');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nueva factura insertada con éxito";
                    
    	} 
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }

    echo $return;

    mysqli_close($dbconn);

 ?>
           
