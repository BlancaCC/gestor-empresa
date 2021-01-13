<?php
	include('cabecera.php');


    $idEstanteria= $_POST['idEstanteria'];

		$sql = "SELECT * FROM almacenadoEn WHERE idEstanteria='$idEstanteria'";

		$query = mysqli_query($dbconn,$sql)
		 or die (mysqli_error($dbconn));

		 $return ="";

		if(mysqli_num_rows($query)==0)
		{

	    $sql = "DELETE FROM estanteria WHERE idEstanteria='$idEstanteria';";

	    	if (mysqli_query($dbconn, $sql)) {
	    		$return .=  "Se ha borrado el estante con éxito.";

	    	}
	    	else {
	    		$return .= "Error: " . $sql . "" . mysqli_error($dbconn);
	         }
		 }
		 else
		 {
			 	$return .= "No se puede borrar una estantería que no se encuentre vacía";
		 }




    echo $return;

    mysqli_close($dbconn);

 ?>
