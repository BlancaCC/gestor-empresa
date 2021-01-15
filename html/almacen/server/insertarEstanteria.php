<?php
	include('cabecera.php');



    $centro = $_POST['centro'];
    $zona = $_POST['zona'];
    $alto = $_POST['alto'];
    $ancho = $_POST['ancho'];
    $largo = $_POST['largo'];


		$return ="";


		if(preg_match("/\A[A-Za-z]{1,2}[0-9]*\z/",$zona))
		{

    	$sql = "INSERT INTO estanteria (dirCentro,zona,alto,ancho,largo)
    				VALUES ('$centro','$zona','$alto','$ancho','$largo');";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Nuevo estante creado con éxito.";

    	}
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }

		}
		else {
			$return .= "Formato incorrecto de zona. Se deben introducir 1 o 2 letras, seguidas opcionalmente de números.";
		}




    echo $return;

    mysqli_close($dbconn);

 ?>
