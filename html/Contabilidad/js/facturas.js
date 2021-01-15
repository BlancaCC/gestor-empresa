
/** GESTIÓN DE Facturas **/


// _____ Consultar Listado de Facturas

function facturas() {
    $.get('/Contabilidad/server/MostrarListadoFacturas.php', $(this).serialize(),
                       function (data) {
                           $("#facturas").html(data);
                       }
    );
}

function insertarFactura(Id, Fecha, DNI_proveedor, DNI_comprador, descripcion, Importe, Tipo) {

    // comprobación parámetros obligatorios
    if(Id == "" || Fecha == "" ||
       DNI_proveedor  == "" || DNI_comprador == "" || descripcion== ""
       ||Importe=="" || Tipo=="") {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // insercción de los datos 
    
    var form_data = $("#pushFactura").serialize();
    
    $.post( '/Contabilidad/server/InsertarFactura.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    facturas();
       
}

function eliminarFactura() {
    var form_data = $("#deleteFactura").serialize();
     $.post('/Contabilidad/server/eliminarFactura.php', form_data, function (response){alert(response);} );
    facturas();
}


$(document).ready(
    function(){
        facturas();

        $('#pushFactura').submit(   
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
                    var Id = document.forms["pushFactura"]["Id"].value;
                    var fecha = document.forms["pushFactura"]["fecha"].value;
                    var DNI_proveedor = document.forms["pushFactura"]["DNI_proveedor"].value;
                    var DNI_comprador = document.forms["pushFactura"]["DNI_comprador"].value;
                    var descripcion = document.forms["pushFactura"]["descripcion"].value;
                    var Importe = document.forms["pushFactura"]["importe"].value;
                    var Tipo = document.forms["pushFactura"]["tipo"].value;
                    
                    var form_data = $(this).serialize();
                    // INSERTAMOS NUEVA FACTURA
                insertarFactura(Id, fecha,DNI_proveedor,DNI_comprador, descripcion, Importe, Tipo) ; 
            }
        )//fin del submit push

        $('#deleteFactura').submit(
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
                    var Id_eliminar = document.forms["deleteFactura"]["Id_eliminar"].value;
                    var form_data = $(this).serialize();
            
                    // ELIMINAMOS FACTURA
                    eliminarFactura(Id_eliminar);
            } //fin function
    
        ); //fin submit delete
    }
    
);
