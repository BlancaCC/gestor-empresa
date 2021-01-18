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
var form_data = $("#deleteCliente").serialize();
 $.post('/marketing/server/eliminarCliente.php', form_data,
                    function (response) 
                        {alert(response);
                    }
                   );
consultarCliente();
}



function insertarCliente(Nombre, Correo, DNI, Publicidad, Fecha, CuentaBancaria) {

    // comprobación parámetros obligatorios
    if(Nombre == "" || Correo == "" ||
       DNI  == "" || Publicidad == "") {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // inserción de los datos 
    
    var form_data = $("#pushCliente").serialize();
    
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

            // determinamos qué acción se ha determinado
            var acciones = document.getElementsByName('accion');
            var tipo_accion = "nula";
            
            acciones.forEach((rate) => {
                if (rate.checked) {
                    tipo_accion = rate.value; 
                }
            }
            )

           
                //________  valor de los campos ______
                var Nombre = document.forms["pushCliente"]["Nombre"].value;
                var Correo = document.forms["pushCliente"]["Correo"].value;
                var DNI = document.forms["pushCliente"]["DNI"].value;
                var Publicidad = document.forms["pushCliente"]["Publicidad"].value;
                var Fecha = document.forms["pushCliente"]["Fecha"].value;
        		var cuentaBancaria = document.forms["pushCliente"]["cuentaBancaria"].value;

                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO Empleado
 		insertarCliente(Nombre, Correo, DNI, Publicidad, Fecha, CuentaBancaria) ;
              
            
           

          
        }

)//fin del submit push


$('#deleteCliente').submit(
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

                //________  valor de los campos ______
                var DNI = document.forms["deleteCliente"]["DNI"].value;
                
                
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
		
                // INSERTAMOS NUEVO Empleado
		 eliminarEmpleado(DNI);
              

            
           

          
        } //fin function

); //fin submit delete

} //fin function
);//fin ready
    

          
