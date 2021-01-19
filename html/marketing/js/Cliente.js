/** GESTIÓN DE Clientes **/


// _____ Consultar Cliente

function consultarCliente() {
 $.get('/marketing/server/consultarCliente.php', $(this).serialize(),
                    function (data) {
                        $("#consultarCliente").html(data);
                    }
                   );
}


function eliminarCliente(DNI) {

    $.post('/marketing/server/eliminarCliente.php', {DNI:DNI},
                    function (response) 
                        {alert(response);
                    }
                   );
    consultarCliente();
}



function insertarCliente(Nombre, Correo, DNI, Publicidad, Fecha, CuentaBancaria) {

    // inserción de los datos 
    
    var form_data = {
        Correo : Correo,
        Nombre : Nombre,
        DNI : DNI,
        Publicidad: Publicidad,
        Fecha: Fecha,
        CuentaBancaria : CuentaBancaria
    };
    
    $.post( '/marketing/server/insertarCliente.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    consultarCliente();
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        consultarCliente();


    $('#pushCliente').submit(
        function(event) {

            event.preventDefault();

           
                //________  valor de los campos ______
                var Nombre = document.forms["pushCliente"]["Nombre"].value;
                var Correo = document.forms["pushCliente"]["Correo"].value;
                var DNI = document.forms["pushCliente"]["DNI"].value;
                var Publicidad = document.forms["pushCliente"]["Publicidad"].value;
                var Fecha = document.forms["pushCliente"]["Fecha"].value;
        		var CuentaBancaria = document.forms["pushCliente"]["CuentaBancaria"].value;

                // vamos  a procesor la información según convenga
 
                // INSERTAMOS NUEVO Empleado
 		insertarCliente(Nombre, Correo, DNI, Publicidad, Fecha, CuentaBancaria) ;
              
            
           

          
        }

)//fin del submit push


$('#deleteCliente').submit(
        function(event) {

            event.preventDefault();
            var DNI = document.forms["deleteCliente"]["DNI"].value;
                
		    eliminarCliente(DNI);
              

                
        } //fin function

); //fin submit delete

} //fin function
);//fin ready
    

          
