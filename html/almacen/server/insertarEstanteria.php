<?php
	include('cabecera.php');



    // -- lectura datos formulario ---

        // variables no nulas
    $centro = $_POST['centro'];
    $zona = $_POST['zona'];
    $alto = $_POST['alto'];
    $ancho = $_POST['ancho'];
    $largo = $_POST['largo'];





    $return ="";



    	$sql = "INSERT INTO estanteria (dirCentro,zona,alto,ancho,largo)
    				VALUES ('$centro','$zona','$alto','$ancho','$largo');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo estante creado con éxito.";

    	}
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }





    echo $return;

    mysqli_close($dbconn);

 ?>
