/** GESTIÓN DE GRUPOS-CLIENTES **/
          function escribirGrupoClientes( data) {
               $("#consultarGrupoCliente").html(data);

           }

          function recargarGrupoCliente() {
              $.get('/marketing/server/consultarGrupoCliente.php',
                    $(this).serialize(),  escribirGrupoClientes);
          }


          
          $(document).ready(
              function(event) {
              recargarGrupoCliente();

          // función para insertar

              $('#pushGrupoCliente').submit(
                  function(event) {

                      event.preventDefault();
                      //alert('funcionando');
                      var nombreGrupo = document.forms["pushGrupoCliente"]["nombreGrupo"].value;
                      var DNI  = document.forms["pushGrupoCliente"]["DNI"].value;

          $.post( '/marketing/server/insertarGrupoCliente.php',
                  {nombreGrupo: nombreGrupo,
                   DNI:DNI},
                        function(response) {
                            alert(response);
                            recargarGrupoCliente();
                        }
                );
                     
                  }
                  
              );
          });

          
          
