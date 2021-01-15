
    // ________ gestion de componentes _______
    function cargarComponentes( data) {
        $("#listarComponentes").html(data);
    }



    function recargarComponentes() {
    $.get('/almacen/server/listarComponentes.php', $(this).serialize(), cargarComponentes);
    }


      // postear datos

      $("#insertarComponente").submit(
          function(event) {
              event.preventDefault();

              var post_url = $(this).attr("action");
              var form_data = $(this).serialize();

              $.post( post_url, form_data,
                      function( response ) {
	                      $("#server-results-insertarComponente").html( response );
                          recargarComponentes();
	                  }
               );
          }
      );


      $(document).ready(recargarComponentes());
