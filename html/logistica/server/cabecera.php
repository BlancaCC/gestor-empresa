<?php
         $dbhost = "mariadb";
         $dbuser = "root";
         $dbpass = "123";
         $db = "rosellipc";
         $dbconn = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

         if(! $dbconn ) {
            die('Could not connect: ' . mysql_error());
         }
?>