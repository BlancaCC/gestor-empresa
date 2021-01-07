/** GESTIÓN DE VEHÍCULOS **/


// _____ Consultar de vehículos

function consultaVehiculos() {
     $.get('/logistica/server/readVehiculos.php', $(this).serialize(),
                    function (data) {
                        $("#consultaVehiculos").html(data);
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
    
    var form_data = $("#pushVehiculos").serialize();
    
    $.post( '/logistica/server/insertarVehiculo.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    consultaVehiculos();
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        consultaVehiculos();




    // _____- gestión del formulario ______


    $('#pushVehiculos').submit(
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
                var tipo = document.forms["pushVehiculos"]["tipo"].value;
                var localizacion = document.forms["pushVehiculos"]["localizacion"].value;
                var capacidad = document.forms["pushVehiculos"]["capacidad"].value;
                var pesomaximo = document.forms["pushVehiculos"]["pesomaximo"].value;
                var estado = document.forms["pushVehiculos"]["estado"].value;

                
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO VEHÍCULO
                if(tipo_accion == "nuevo") {

      
                    insertarVehiculo(tipo, localizacion,capacidad,pesomaximo, estado) ;
                        
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
          
