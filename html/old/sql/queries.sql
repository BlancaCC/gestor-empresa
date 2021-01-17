/**
FICHERO CON EJEMPLO DE CONSULTAS QUE DEBE SABER HACER LA BASE DE DATOS 

He creado este fichero por tenerlos almacenado en algún sitio y para que sirva de ejemplo a las consultas de la pag web
*/



-------------- logistica ________________

-- Visualizar en vehículo donde está 
SELECT v.matricula, l.localizacion, v.tipoVehiculo
FROM vehiculo v, localizarVehiculo l
WHERE v.matricula = l.matricula;

-- introducir un valor y borrarlo
INSERT INTO vehiculo ( matricula,tipoVehiculo,   capacidad ,    pesoMaximoCarga  ,   estado )
VALUES
('0', 'furgoneta', 200, 300,'vacio' );

INSERT INTO localizarVehiculo ( matricula, localizacion  )
VALUES
('0',  'granada' );

DELETE FROM localizarVehiculo WHERE matricula='0';
DElETE FROM vehiculo WHERE matricula='0';
