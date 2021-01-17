
    // ________ gestion de estanterias _______
    function cargarEstanterias( data) {
        $("#consultaEstanterias").html(data);
    }



    function recargarEstanterias() {
    $.get('/almacen/server/consultarEstanterias.php', $(this).serialize(), cargarEstanterias);
    }


      // postear datos

      $("#pushEstanteria").submit(
          function(event) {
              event.preventDefault();

              var post_url = $(this).attr("action");
              var form_data = $(this).serialize();

              $.post( post_url, form_data,
                      function( response ) {
	                      alert( response );
                          recargarEstanterias();
	                  }
               );
          }
      );


      $(document).ready(recargarEstanterias());
