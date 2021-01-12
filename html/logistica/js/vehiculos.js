/** GESTIÓN DE VEHÍCULOS **/


import { writeOrderModify } from './modifyVehiculo.js'; 

// _____ Consultar de vehículos

function consultaVehiculos() {
    
    $.get('/logistica/server/readVehiculos.php',
                    function (data) {
                        $("#consultaVehiculos").html(data);
                    }
         );

    $.get('/logistica/server/readVehiculosSinLocalizar.php',
                    function (data) {
                        $("#consultaSinLocalizar").html(data);
                    }
         );
    
}


function insertarVehiculo(tipo, localizacion,capacidad,pesomaximo, estado) {

    // comprobación parámetros obligatorios
    if( tipo == "" || localizacion == "" ||
       capacidad  == "" || pesomaximo == "" ||
       estado  == "" ) {
        alert( "Para hacer una insercción es necesario que ningún campo esté vacío");
        return ;
    }

    // insercción de los datos 

    //esto es redundante, lo idal sería pasarlse los argumentos de la función
    // CAMBIAR EN EL FUTURO
    var form_data = $("#pushVehiculos").serialize();
    
    $.post( '/logistica/server/insertarVehiculo.php',
            form_data,
            function(response) {
                alert(response);
                consultaVehiculos();
            }
          );
                    
    // actualizamos el contenido de la página
    
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        // ___ visualización de la tabla  ___ 
        consultaVehiculos();

        // _____- gestión del formulario ______


    $('#pushVehiculos').submit(
        function(event) {

            event.preventDefault();

            // determinamos qué acción se ha determinado
            var acciones = document.getElementsByName('accion');
            var tipo_accion = "nula";
            
            acciones.forEach(
                (rate) => {
                    if (rate.checked) {
                        tipo_accion = rate.value; 
                    }
                }
            );
            
            
            //________  valor de los campos ______

            
            var matricula = document.forms["pushVehiculos"]["matricula"].value;
            var tipo = document.forms["pushVehiculos"]["tipo"].value;
            var localizacion = document.forms["pushVehiculos"]["localizacion"].value;
            var capacidad = document.forms["pushVehiculos"]["capacidad"].value;
            var pesomaximo = document.forms["pushVehiculos"]["pesomaximo"].value;
            var estado = document.forms["pushVehiculos"]["estado"].value;

            
            // vamos  a procesor la información según convenga
            var form_data = $(this).serialize();
            // INSERTAMOS NUEVO VEHÍCULO
            switch(tipo_accion) {
                
            case "nuevo": 

                
                insertarVehiculo(tipo, localizacion,capacidad,pesomaximo, estado) ;
                
                break;
                
            case "modificar":

                
                var orden_php = writeOrderModify(matricula,tipo, localizacion,capacidad,pesomaximo, estado)
                
                $.post( '/logistica/server/modificarVehiculo.php',
                        {order: orden_php},
                        function(response) {
                            alert(response);
                            consultaVehiculos();
                        }
                      );
                break;

            case "borrar":

                 $.post( '/logistica/server/borrarVehiculo.php',
                        {matricula: matricula},
                        function(response) {
                            alert(response);
                            consultaVehiculos();
                        }
                      );
                break;
                
            default: 
               
                alert(`Debe seleccionar una acción antes de seguir` );  
                
                break; 

                
                
                
            }
            

            // determinar el tipo de acción
            // (borrar, modificar, insertar ...)

            //if( accion)
        }
    ); // fin submit 
    }
   
    
); // fin del onready 

