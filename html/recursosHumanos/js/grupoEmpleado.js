/** GESTIÓN DE GRUPOS-EMPLEADOS **/


// _____ Consultar grupo-empleados

function consultaGrupoEmpleado() {
$.get('/recursosHumanos/server/consultarGrupoEmpleado.php', $(this).serialize(),
                    function (data) {
                        $("#consultaGrupoEmpleados").html(data);
                    }
                   );
}


function insertarGrupoEmpleado(nombre, dni) {

    // comprobación parámetros obligatorios
    if(nombre == "" || dni == "") {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // insercción de los datos 
    
    var form_data = $("#pushGrupoEmpleado").serialize();
    
    $.post( '/recursosHumanos/server/insertarGrupoEmpleado.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    consultaGrupoEmpleado();
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        consultaGrupoEmpleado();




    // _____- gestión del formulario ______


    $('#pushGrupoEmpleado').submit(
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
                var nombre = document.forms["pushGrupoEmpleado"]["nombre"].value;
                var dni = document.forms["pushGrupoEmpleado"]["dni"].value;
                
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO Empleado
                if(tipo_accion == "nuevo") {

      
                    insertarGrupoEmpleado(nombre,dni) ;
                        
                }
                else {
                    alert(`Se ha seleccionado ${tipo_accion}, que no tiene nada programado` );
                    console.log(`Se ha seleccionado ${tipo_accion}, que no tiene nada programado` );  
                }
            
            }
           

        }
    );
    

    }
); // fin del onready 
          
