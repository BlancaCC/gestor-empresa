/** GESTIÓN DE VEHÍCULOS **/


$(document).ready(

    function(){
    // ______ mostrar tabla  ______ 
              $.get('/logistica/server/readVehiculos.php', $(this).serialize(),
                    function (data) {
                        $("#consultaVehiculos").html(data);
                    }
                   );




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
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO VEHÍCULO
                if(tipo_accion == "nuevo") {

                    $.post( '/logistica/sever/insertarVehiculo.php',
                           form_data,
                           function(response) {alert(response);}
                         );
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
          
