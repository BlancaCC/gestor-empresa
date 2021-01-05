<?php
	include('cabecera.php');


$success = []; 

	//if(isset($_POST['submit']))
	{

		// versión para meter datos en la base de datos

		$matricula = $_POST['matricula'];
		$tipo = $_POST['tipo'];

		$capacidad = $_POST['capacidad'];
		$peso_maximo = $_POST['pesomaximo'];
		$estado = $_POST['estado'];

		if( isset($_POST['accion']))
		{
			$accion = $_POST['accion'];



			if( $accion== "borrar" || $accion == "modificar") 
			{


				$sql = "DELETE FROM localizarVehiculo WHERE matricula='$matricula'";
			
				if (mysqli_query($dbconn, $sql))
				{
					//echo "Se borra la localización de vehiculo";
                   $listado =array('success' => 1);
				} 
				else 
				{
					//echo "Error: " . $sql . "		" . mysqli_error($dbconn);
					// echo "<br>Localización vacía del vehículo";
                $listado = array('success' => 0);
                
				}
			
				$sql = "DELETE FROM vehiculo WHERE matricula='$matricula'";
			
				if (mysqli_query($dbconn, $sql))
				{
					echo "Se borra vehiculo ";
				} 
				else 
				{
					echo "Error: " . $sql . " " . mysqli_error($dbconn);
				}
				
			} // fin de borrar
			
			if( $accion == "nuevo" || $accion== "modificar") 
			{

				$sql = "INSERT INTO vehiculo (matricula, tipoVehiculo, capacidad,pesoMAximoCarga, estado)
				VALUES ('$matricula', '$tipo', $capacidad, $peso_maximo, '$estado');";

				if (mysqli_query($dbconn, $sql)) 
				{
					//echo "Nuevo vehículo guardado, recarga para ver !";
                $listado =array('success' => 1);
				} 
				else 
				{
					//echo "Error: " . $sql . "" . mysqli_error($dbconn);
                    $listado =array('success' => 0, 'mesage' => "Error: " . $sql . "" . mysqli_error($dbconn));    
					
				} 

				if(!empty($_POST['localizacion'])) 
				{	
					$localizacion = $_POST['localizacion'];

					$sql = "INSERT INTO localizarVehiculo (matricula, localizacion)
							VALUES ('$matricula','$localizacion');";

					if (mysqli_query($dbconn, $sql)) 
					{
						//echo "Nuevo vehiculo y localización añadida!";
                        $listado = array('success' => 1);
					} 
					else 
					{
						//echo "Error: " . $sql . " " . mysqli_error($dbconn);
                        $listado =array('success' => 0);
					}
				}
				else 
				{
					//echo "Localización vacía del vehículo";
                    $listado =array('success' => 1);
				}
			} // fin localización 

		} // fin acction 
		

    echo json_encode($success, JSON_FORCE_OBJECT);
		mysqli_close($dbconn);
	} // fin botón 

?>