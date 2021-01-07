/** GESTIÓN DE EMPLEADOS **/


// _____ Consultar empleados

function consultaEmpleados() {
 $.get('/recursosHumanos/server/consultarEmpleados.php', $(this).serialize(),
                    function (data) {
                        $("#consultaEmpleados").html(data);
                    }
                   );
}


function insertarEmpleado(dni, nombre,apellidos,telefono, direccion, direccionCentro, grupo) {

    // comprobación parámetros obligatorios
    if(dni == "" || nombre == "" ||
       apellidos  == "" || direccionCentro == "") {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // insercción de los datos 
    
    var form_data = $("#pushEmpleados").serialize();
    
    $.post( '/recursosHumanos/server/insertarEmpleado.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    consultaEmpleados();
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        consultaEmpleados();




    // _____- gestión del formulario ______


    $('#pushEmpleados').submit(
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
                var dni = document.forms["pushEmpleados"]["dni"].value;
                var nombre = document.forms["pushEmpleados"]["nombre"].value;
                var apellidos = document.forms["pushEmpleados"]["apellidos"].value;
                var telefono = document.forms["pushEmpleados"]["telefono"].value;
                var direccion = document.forms["pushEmpleados"]["direccion"].value;
		var direccionCentro = document.forms["pushEmpleados"]["direccionCentro"].value;
		var grupo = document.forms["pushEmpleados"]["grupo"].value;
                
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO Empleado
                if(tipo_accion == "nuevo") {

      
                    insertarEmpleado(dni, nombre,apellidos,telefono, direccion, direccionCentro, grupo) ;
                        
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
          
