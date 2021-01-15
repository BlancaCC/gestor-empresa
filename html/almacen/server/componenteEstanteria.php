<?php
	include('cabecera.php');

		$idComp = $_POST['idComp'];
    $idEstanteria = $_POST['idEstanteria'];


		$sql = "INSERT INTO almacenadoEn (idComp,idEstanteria)
    VALUES ('$idComp','$idEstanteria');";

    if (mysqli_query($dbconn, $sql))
		{

			echo "Guardado";
		}
		else
		{
			echo "Error: " . $sql . "" . mysqli_error($dbconn);
		}


	mysqli_close($dbconn);

?>
