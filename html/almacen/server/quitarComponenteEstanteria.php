<?php
	include('cabecera.php');


    $idComp= $_POST['idComp'];
    $idEstanteria = $_POST['idEstanteria'];


    $sql = "DELETE FROM almacenadoEn WHERE idComp='$idComp' and idEstanteria='$idEstanteria';";


    $return ="";

    	if (mysqli_query($dbconn, $sql)) {
    		$return .=  "Se han quitado las componentes de la estantería.";

    	}
    	else {
    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
         }





    echo $return;

    mysqli_close($dbconn);

 ?>
