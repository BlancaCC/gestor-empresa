/** GESTIÓN DE GRUPOS **/


// _____ Consultar grupos

function consultarGrupo() {
$.get('/marketing/server/consultarGrupo.php', $(this).serialize(),
                    function (data) {
                        $("#consultarGrupo").html(data);
                    }
                   );
}


function insertarGrupo(nombreGrupo) {

    // comprobación parámetros obligatorios
    if(nombreGrupo == "" ) {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // insercción de los datos 
    
    var form_data = $("#pushGrupo").serialize();
    
    $.post( '/marketing/server/insertarGrupo.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    consultarGrupo();
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        consultarGrupo();




    // _____- gestión del formulario ______


    $('#pushGrupo').submit(
        function(event) {

            event.preventDefault();

            // determinamos qué acción se ha determinado
            var acciones = document.getElementsByName('accion');
            var tipo_accion = "nula";
            
            acciones.forEach((rate) => {
                        if (rate.checked) {
                            tipo_accion = rate.value; 
                        }
                    }
                )
            
            //Valor de los campos
            var nombreGrupo = document.forms["pushGrupo"]["nombreGrupo"].value;
       
                
            var form_data = $(this).serialize();

            // IInsertamos un nuevo grupo a la tabla
      
                insertarGrupo(nombreGrupo) ;
                        
            
            

            
        }
    );
    

    }
); // fin del onready 
          
