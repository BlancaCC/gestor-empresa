
    // ________ gestion de centros _______ 
    function cargarCentros( data) {
        $("#consultaCentros").html(data);
    }

    

    function recargarCentros() {
    $.get('/logistica/server/readCentro.php', $(this).serialize(), cargarCentros);
    }


      // postear datos 

      $("#pushCentro").submit(
          function(event) {
              event.preventDefault();
          
              var post_url = $(this).attr("action");
              var form_data = $(this).serialize();

              $.post( post_url, form_data,
                      function( response ) {
	                      $("#server-results-centro").html( response );
                          recargarCentros();
	                  }
               );
          }
      );
          
      
      $(document).ready(recargarCentros());
