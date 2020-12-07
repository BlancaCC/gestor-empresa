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
	
	<table>
	  <tr>
	    
	    <h3> Nuevo vehículo </h3>

	  <tr>
	<form action="" method="post">
	  
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
	  <br>
	    

	  
      </p>

	  <input type="submit" value="nuevo" name="save">
	  <input type="submit" value="borrar" name="borrar">
	  <input type="submit" value="modificar" name="modificar">

	</form>
</tr>
		  </table>
</body>



</html>
