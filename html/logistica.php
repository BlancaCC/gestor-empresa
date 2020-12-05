<html>
   <head>
      <title>roselli logistica</title>
   </head>
   <body>
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

         mysqli_close($dbconn);
      ?>


      <form action="insert.php" method="post">
      <p>
	  <label for="name">Nombre vehículo:</label>
          <input type="text" name="name" id="name">
    	  </p>

    <input type="submit" value="Submit">
</form>
   </body>


</html>
