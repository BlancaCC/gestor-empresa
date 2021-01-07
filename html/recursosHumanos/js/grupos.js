/** GESTIÓN DE EMPLEADOS **/


// _____ Consultar empleados

function consultaGrupos() {
$.get('/recursosHumanos/server/consultarGrupos.php', $(this).serialize(),
                    function (data) {
                        $("#consultaGrupos").html(data);
                    }
                   );
}


function insertarGrupo(nombre) {

    // comprobación parámetros obligatorios
    if(nombre == "" ) {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // insercción de los datos 
    
    var form_data = $("#pushGrupos").serialize();
    
    $.post( '/recursosHumanos/server/insertarGrupo.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    consultaGrupos();
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        consultaGrupos();




    // _____- gestión del formulario ______


    $('#pushGrupos').submit(
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

            if(tipo_accion == "nula"){
              alert(`Debe seleccionar una acción antes de seguir` );  
            }
            else {
                //________  valor de los campos ______
                var nombre = document.forms["pushGrupos"]["nombre"].value;
       
                
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO Empleado
                if(tipo_accion == "nuevo") {

      
                    insertarGrupo(nombre) ;
                        
                }
                else {
                    alert(`Se ha seleccionado ${tipo_accion}, que no tiene nada programado` );
                    console.log(`Se ha seleccionado ${tipo_accion}, que no tiene nada programado` );  
                }
            
            }
           

            // determinar el tipo de acción
            // (borrar, modificar, insertar ...)

            //if( accion)
        }
    );
    

    }
); // fin del onready 
          
