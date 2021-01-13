<?php
	include('cabecera.php');



    // -- lectura datos formulario ---

        // variables no nulas
    $idComp= $_POST['idComp'];


    $sql = "DELETE FROM componente WHERE idComp='$idComp';";


    $return ="";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Se han borrado las componentes con éxito.";

    	}
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }





    echo $return;

    mysqli_close($dbconn);

 ?>
