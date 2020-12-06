<html>
   <head>
      <title>roselli logistica</title>
   </head>
   <body>

     
     <div class="topnav">
       <a class="active" href="logistica.php">Logistica</a>
       <a href="./">Home</a>
     </div>


     
        <style>
        td,th {
        border: solid black 1px;
        font-size: 30px;
        width: 200px;
        }
        </style>
	<h1> Vehiculos</h1>
        <table>
        <tr>
        <th>id</th>
        <th>name</th>
        </tr>
      <?php
         $dbhost = "mariadb";
         $dbuser = "root";
         $dbpass = "123";
         $db = "rosellipc";
         $dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

         if(! $dbconn ) {
            die('Could not connect: ' . mysql_error());
         }
         $query = mysqli_query($dbconn, "SELECT * FROM vehiculo")
            or die (mysqli_error($dbconn));

         while ($row = mysqli_fetch_array($query)) {
            echo
                "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                </tr>";
         }

         //mysqli_close($dbconn);

   if(isset($_POST['save']))
 {	 
	 $name = $_POST['name'];
	
	 $sql = "INSERT INTO vehiculo (name)
	 VALUES ('$name')";

	 if (mysqli_query($dbconn, $sql)) {
		echo "Nuevo vehículo guardado, recarga para ver !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($dbconn);
	 }
	 mysqli_close($dbconn);
}
?>
      <form action="" method="post">
      <p>
	  <label for="name">Nombre vehículo:</label>
          <input type="text" name="name" id="name">
    	  </p>

    <input type="submit" value="Submit" name="save">
</form>
   </body>


</html>
