<?php
      include('cabecera.php');

        $query = mysqli_query($dbconn, "SELECT * FROM centro;")

            or die (mysqli_error($dbconn));


        $noVacio = false;
    
         if ($row = mysqli_fetch_array($query)) {
            $noVacio = true;
         }


    if($NOvACIO) {

    // función de borrado
    // $return 
    }

    else {
    $return = "No existe el cliente a borar
}

    
        echo $return;
         mysqli_close($dbconn);


?>