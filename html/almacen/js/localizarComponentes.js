
    $("#localizarComponente").submit(
        function(event) {
            event.preventDefault();

            var post_url = $(this).attr("action");
            var form_data = $(this).serialize();

            $.post( post_url, form_data,
                    function( response ) {
                      $("#server-results-localizarComponente").html( response );
                  }
             );
        }
    );
