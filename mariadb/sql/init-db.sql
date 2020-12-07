USE rosellipc;


---------------- DECLARACIÓN DE TABLAS -----------------------

-- logistica 

CREATE TABLE centro (
direccion VARCHAR(200) NOT NULL,
telefono VARCHAR (30) NOT NULL,
nombre VARCHAR (30) NOT NULL,
PRIMARY KEY (direccion)


);
CREATE TABLE vehiculo (
       matricula VARCHAR(30) NOT NULL,
       tipoVehiculo VARCHAR(30),
       capacidad INT,
       pesoMaximoCarga INT,
       estado VARCHAR(100),
       
       PRIMARY KEY (matricula)
      
);

CREATE TABLE localizarVehiculo (
       matricula VARCHAR(30) NOT NULL,
       localizacion VARCHAR(200),
       
       PRIMARY KEY (matricula),      
        CONSTRAINT `cetro_vehiculo_localizarVehiculo`
    FOREIGN KEY (localizacion) REFERENCES centro (direccion)

);



--------------------- INTRODUCCIÓN DE DATOS  ---------------------



INSERT INTO centro( direccion, telefono, nombre)
VALUES
('malaga','978123456','malagroselli'),
('granada','958123456','graxselli'),
('jaen','908123456','jaeroselli'),
('almeria','978123456','alagroselli'),
('sevilla','918123456','seroselli'),
('cadiz','990123456','seroselli'),
('hueva','954813456','huoselli'),
('cordoba','924813456','coroselli'),
('madrid','900813456','mariselli'),
('barcelona','9001813456','coroselli');

       

INSERT INTO vehiculo ( matricula,tipoVehiculo,   capacidad ,    pesoMaximoCarga  ,   estado )
VALUES
('77777777qqw', 'furgoneta', 200, 300,'vacio' ),
('12999993qqw', 'camion', 600, 350, 'estropeado' ),
('12321123qqw', 'camion', 600, 350, 'vacio' ),
('12321123qqq', 'camion', 600, 350, 'cargado' ),
('11111111abc', 'camion', 600, 350, 'cargado' ),
('12000064jwe', 'furgoneta', 100, 289, 'vacio' ),
('12322564jee', 'camion', 200, 700, 'cargado' ),
('11111564jee', 'furgoneta', 100, 289, 'vacio' ),
('12322564jpp', 'furgoneta', 100, 289, 'cargado' ),
('12134564jfe', 'furgoneta', 100, 289, 'cargado' );



INSERT INTO localizarVehiculo ( matricula, localizacion  )
VALUES
('77777777qqw',  'granada' ),
('12999993qqw',  'granada' ),
('12321123qqw', 'granada' ),
('12321123qqq',  'granada' ),
('11111111abc', 'sevilla' ),
('12000064jwe',  'sevilla' ),
('12322564jee',  'jaen' ),
('11111564jee', 'jaen' ),
('12322564jpp',  'jaen' ),
('12134564jfe',  'malaga');

