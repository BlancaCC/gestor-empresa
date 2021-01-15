<?php
	include('cabecera.php');


    $idComp= $_POST['idComp'];

		$sql = "SELECT * FROM almacenadoEn WHERE idComp='$idComp'";

		$query = mysqli_query($dbconn,$sql)
		 or die (mysqli_error($dbconn));

		 $return ="";

		if(mysqli_num_rows($query)==0)
		{
	    $sql = "DELETE FROM componente WHERE idComp='$idComp';";


	    $return ="";

	    	if (mysqli_query($dbconn, $sql)) {
	    		$return .=  "Se han borrado las componentes con éxito.";

	    	}
	    	else {
	    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
	         }
		 }
		 else
		 {
				$return .= "Hay que dar de baja primero la componente en las estanterías";
		 }


    echo $return;

    mysqli_close($dbconn);

 ?>
