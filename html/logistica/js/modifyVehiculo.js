/**
La orden en js es de la forma   

UPDATE vehiculos SET columna= valor where matricula = valor; 

otro ejemplo de sintaxis de sql. 

UPDATE  vehiculo, localizarVehiculo 
SET vehiculo.tipoVehiculo='no pruebas', localizarVehiculo.localizacion='jaen'
WHERE vehiculo.matricula = '0' && localizarVehiculo.matricula = '0';
*/ 


function  writeOrderModify(matricula,tipo, localizacion,capacidad,pesomaximo, estado) {

    var order = 'UPDATE vehiculo, localizarVehiculo  SET ';

    // añadir al final  where vehiculo.matricula = matricula && localizacion.matricula = matricula; 

    /**
    var tipo = document.forms["pushVehiculos"]["tipo"].value;
    var localizacion = document.forms["pushVehiculos"]["localizacion"].value;
    var capacidad = document.forms["pushVehiculos"]["capacidad"].value;
    var pesomaximo = document.forms["pushVehiculos"]["pesomaximo"].value;
    var estado = document.forms["pushVehiculos"]["estado"].value;
    var matricula = document.forms["pushVehiculos"]["matricula"].value;
*/

    var add_coma = false;

    if( tipo != "") {
        order += 'vehiculo.tipoVehiculo = ' + "'"  +  tipo + "'" ; 
        add_coma = true; 
    }

    if( localizacion != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' localizarVehiculo.localizacion = '  +  "'" +  localizacion + "'" ;        
    }

    if( capacidad != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' vehiculo.capacidad = '  + capacidad;        
    }

      if( pesomaximo != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' vehiculo.pesoMaximoCarga = '  + pesomaximo;        
      }


    
    
    if( estado != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += " vehiculo.estado = '"  + estado +"'";        
    }
    
  
    order +=' WHERE vehiculo.matricula = '+ "'" + matricula + "'" + ' && localizarVehiculo.matricula = ' + "'" + matricula + "';" ;


    return order; 
   
    
}



export { writeOrderModify }; 
