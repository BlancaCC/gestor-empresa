/** GESTIÓN DE GRUPOS-CLIENTES **/


// _____ Consultar grupo-clientes

function consultarGrupoCliente() {
$.get('/marketing/server/consultarGrupoCliente.php', $(this).serialize(),
                    function (data) {
                        $("#consultarGrupoCliente").html(data);
                    }
                   );
}


function insertarGrupoCliente(nombre, dni) {

    // comprobación parámetros obligatorios
    if(nombreGrupo == "" || DNI == "") {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // insercción de los datos 
    
    var form_data = $("#pushGrupoCliente").serialize();
    
    $.post( '/marketing/server/insertarGrupoCliente.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    consultarGrupoCliente();
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        consultarGrupoCliente();




    // _____- gestión del formulario ______


    $('#pushGrupoCliente').submit(
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
                var nombreGrupo = document.forms["pushGrupoCliente"]["nombreGrupo"].value;
                var DNI = document.forms["pushGrupoEmpleado"]["DNI"].value;
                
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO Grupo-Empleado
                if(tipo_accion == "nuevo") {

      
                    insertarGrupoEmpleado(nombreGrupo,DNI) ;
                        
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
          
