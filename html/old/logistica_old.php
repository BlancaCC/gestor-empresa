<html>
   <head>
     <title>roselli logistica</title>
     <link rel="stylesheet" href="styles.css">

   </head>
   <body>
    
     <div class="topnav">
       <a class="active" href="logistica.php">Logistica</a>
       <a href="./">Home</a>
     </div>


   
	<h1> Información vehículos</h1>
        <table>
        <tr>
        <th>Matricula</th>
        <th>TipoVehiculo</th>
	<th>Capacidad</th>
	<th>Peso máximo de la carga (x100kg)</th>
	<th> Localizacion </th>
	<th> Estado </th>
        </tr>
	     <?php include 'logisticaVehiculos.php'; ?>
	</table>
	
	
	 
	    
	    <h3>Vehículo </h3>

	  
	<form action="pushVehiculos.php" method="post">
	  
	  <p>
	    
	  <label for="matricula">Matricula vehículo:</label> 	  <br>
          <input type="text" name="matricula" id="matricula">
	  <br>
	  <label for="tipo">Tipo vehículo: </label> 	  <br>
          <input type="text" name="tipo" id="tipo">
	   <br>
	  <label for="localizacion">Localización: </label> 	  <br>
          <input type="text" name="localizacion" id="localizacion">
	  <br>
	  <label for="capacidad">Capacidad: </label> 	  <br>
          <input type="text" name="capacidad" id="capacidad">
	  <br>
	  <label for="pesomaximo">Peso máximo: </label> 	  <br>
          <input type="text" name="pesomaximo" id="pesomaximo">
	  <br>
	  <label for="estado">Estado: </label> 	  <br>
          <input type="text" name="estado" id="estado">
	  <br><br>
	  Tipo acción: <br>
	  <input type="radio" value="nuevo" name="accion" id="nuevo"> guardar
	  <input type="radio" value="borrar" name="accion" id="borrar"> borrar
	  <input type="radio" value="modificar" name="accion" id="modificar"> modificar
	    

	  
      </p>

	  <input type="submit" value="submit" name="submit">
	</form>
	 


	<h2> Centros  </h2>

	 <table>
        <tr>
        <th> Direccion </th>
        <th> Telefono </th>
	<th> Nombre </th>
	    </tr>
	     <?php include 'logisticaCentro.php'; ?>
	 </table>

	 <h3> Registrar nuevos centros </h3>


	 <form action="pushCentro.php" method="post">
	  
	  <p>
	    
	  <label for="direccion"> Direccion :</label> 	  <br>
          <input type="text" name="direccion" id="direccion">
	  <br>
	  <label for="telefono"> Teléfono: </label> 	  <br>
          <input type="text" name="telefono" id="telefono">
	   <br>
	  <label for="nombre"> Nombre: </label> 	  <br>
          <input type="text" name="nombre" id="nombre">
	  <br>
	  	  
	  </p>

	  <input type="submit" value="submit" name="submit">
	</form>


	 

	<h2> Vehículo sin localizar </h2>

	
	
	     <?php include 'logisticaVehiculosSinLocalizar.php'; ?>
	
	

	
</body>



</html>
