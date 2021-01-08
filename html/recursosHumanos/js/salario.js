/** GESTIÓN DE Salarios **/





function insertarSalario(codigo, dni) {

    // comprobación parámetros obligatorios
    if(nombre == "" || dni = "") {
        alert( "Hay algún campo que no puede estar vacío");
        return ;
    }

    // insercción de los datos 
    
    var form_data = $("#pushSalario").serialize();
    
    $.post( '/recursosHumanos/server/asignarSalario.php',
            form_data,
            function(response) {alert(response);}
          );
                    
    // actualizamos el contenido de la página
    
       
}

    



// ejecución cuando el documento esté listo 
$(document).ready(

    function(){

        




    // _____- gestión del formulario ______


    $('#pushSalario').submit(
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
                var codigo = document.forms["pushSalario"]["codigo"].value;
       		 var dni = document.forms["pushSalario"]["dni"].value;
                
                // vamos  a procesor la información según convenga
                var form_data = $(this).serialize();
                // INSERTAMOS NUEVO Empleado
                if(tipo_accion == "nuevo") {

      
                    insertarGrupo(codigo, dni) ;
                        
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
          
