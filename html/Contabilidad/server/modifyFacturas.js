/**
La orden en js es de la forma   

UPDATE vehiculos SET columna= valor where matricula = valor; 

otro ejemplo de sintaxis de sql. 

UPDATE  vehiculo, localizarVehiculo 
SET vehiculo.tipoVehiculo='no pruebas', localizarVehiculo.localizacion='jaen'
WHERE vehiculo.matricula = '0' && localizarVehiculo.matricula = '0';
*/ 


function  writeOrderModify(Id,fecha, DNI_proveedor,DNI_comprador,descripcion, importe, tipo) {

    var order = 'UPDATE Factura SET ';

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

    if( fecha != "") {
        order += 'Factura.fecha = ' + "'"  +  fecha + "'" ; 
        add_coma = true; 
    }

    if( DNI_proveedor != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' Factura.DNI_proveedor = '  +  "'" +  DNI_proveedor + "'" ;        
    }

    if( DNI_comprador != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' Factura.DNI_comprador = ' + "'" +  DNI_proveedor + "'" ;        
    }

    if( descripcion != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' Factura.descripcion = ' + "'" +  descripcion + "'" ;        
    }
    
    if( importe != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' Factura.importe = ' + "'" +  importe + "'" ;       
    }

    if( tipo != "") {
        if(add_coma)
            order += ','
        else
            add_coma = true;
        
        order += ' Factura.tipo = ' + "'" +  tipo + "'" ;       
    }
    
  
    order +=' WHERE Factura.Id = '+ "'" + Id + "';" ;


    return order; 
   
    
}



export { writeOrderModify }; 
