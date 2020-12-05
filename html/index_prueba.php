<html>
   <head>
      <title>Fetching Data from MariaDB Server</title>
   </head>
   <body>
        <style>
        td,th {
        border: solid black 1px;
        font-size: 30px;
        width: 200px;
        }
        </style>
        <table>
        <tr>
        <th>Name</th>
        <th>Pseudonimo</th>
        </tr>
      <?php
         $dbhost = "mariadb";
         $dbuser = "user";
         $dbpass = "123";
         $db = "testdb";
         $dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

         if(! $dbconn ) {
            die('Could not connect: ' . mysql_error());
         }
         $query = mysqli_query($dbconn, "SELECT * FROM test")
            or die (mysqli_error($dbconn));

         while ($row = mysqli_fetch_array($query)) {
            echo
                "<tr>
                <td>{$row['name']}</td>
                <td>{$row['pseudonimo']}</td>
                </tr>";
         }

         mysqli_close($dbconn);
      ?>
   </body>
</html>
