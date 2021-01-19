use rosellipc;
    
CREATE TABLE grupoClientes (
       nombreGrupo VARCHAR(20) NOT NULL,
       PRIMARY KEY (nombreGrupo)
);

INSERT INTO grupoClientes( nombreGrupo)
VALUES
('Nacionales'),
('Estadounidenses'),
('Mayoristas'),
('Indios'),
('Japoneses'),
('Irlandeses'),
('Empresarios'),
('Individuales'),
('Multinacionales'),
('PequenioComercio');



CREATE TABLE Cliente (
       Nombre VARCHAR(20),
            Correo VARCHAR(30),
DNI VARCHAR(20) NOT NULL,
Publicidad VARCHAR(10),
Fecha DATE,
CuentaBancaria VARCHAR(50),
       PRIMARY KEY (DNI)

);

INSERT INTO Cliente ( Nombre, Correo, DNI, Publicidad, Fecha, CuentaBancaria)
VALUES

('Sofia Perez', 'sofia.azul.pm@gmail.com', '77373452A', 'ninguno', '2010-11-12', 'ES77858276'),
('Will Smith', 'willythefunny@gmail.com', 'F245-67-737', 'redes', '2010-01-02', 'ES24174435'),
('Manuel Estepa', 'manolin@hotmail.es', '88745653E', 'television', '2010-12-21', 'ES24178276'),
('Bawat Hiwto', 'dhelibawat88@gmail.in', '000866S38', 'television', '2010-09-27', 'ES27896276'),
('Hayao Miyazaki', 'studioghibli@gmail.ja', '7739008219HGHLLS', 'radio', '2000-01-12', 'ES24155566'),
('Brendan McFill', 'bmf_86@hotmail.com', 'F44898867', 'redes', '2016-02-08', 'ES23238276'),
('Alejandro Milena', 'alpemi@gmail.com', '77754325F', 'ninguno', '2016-04-12', 'ES24665443'),
('Hugh Jackman', 'mlove_callme@gmail.com', 'CA245-67-737','television', '2013-05-30', 'ES88933576'),
('Yuko Okono', 'japonjamon@gmail.com', '7768003317HGHLLS', 'redes', '2020-06-22', 'ES45896734'),
('Bernarda Pardo', 'berlinares@gmail.com', '89893455W', 'ninguno', '2019-12-02', 'ES00298417');
    

CREATE TABLE perteneceCliente (
       nombreGrupo VARCHAR(20) NOT NULL,
       DNI VARCHAR(20),
       FOREIGN KEY (nombreGrupo) REFERENCES grupoClientes(nombreGrupo),
       FOREIGN KEY (DNI) REFERENCES Cliente (DNI)
);

INSERT INTO perteneceCliente( nombreGrupo, DNI)
VALUES
('Nacionales', '77373452A'),
('Estadounidenses', 'F245-67-737'),
('Mayoristas', '88745653E'),
('Indios', '000866S38'),
('Japoneses', '7739008219HGHLLS'),
('Irlandeses', 'F44898867'),
('Empresarios', '77754325F'),
('Individuales', 'CA245-67-737'),
('Multinacionales', '7768003317HGHLLS'),
('PequenioComercio', '89893455W');


CREATE TABLE centro (
direccion VARCHAR(200) NOT NULL,
telefono VARCHAR (30) NOT NULL,
nombre VARCHAR (30) NOT NULL,

PRIMARY KEY (direccion),
CONSTRAINT telefono_centro_unico UNIQUE (telefono)

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




INSERT INTO centro( direccion, telefono, nombre)
VALUES
('malaga','978123456','malagroselli'),
('granada','958123456','graxselli'),
('jaen','908123456','jaeroselli'),
('almeria','978123416','alagroselli'),
('sevilla','918123456','seroselli'),
('cadiz','990123456','seroselli'),
('hueva','954813456','huoselli'),
('cordoba','924813456','coroselli'),
('madrid','900813456','mariselli'),
('barcelona','9001816','coroselli');

       

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
('12322565jpp', 'furgoneta', 100, 289, 'ejemplo_sin_localizar' ), 
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


CREATE TABLE Factura (
       Id INT NOT NULL AUTO_INCREMENT,
       Fecha DATE NOT NULL,
       DNI_proveedor VARCHAR(9) NOT NULL,
       DNI_comprador VARCHAR(9) NOT NULL,
       Descripcion VARCHAR(120) NOT NULL,
       Importe DOUBLE NOT NULL,
       Tipo DOUBLE NOT NULL,
       PRIMARY KEY (Id)
);

INSERT INTO Factura (Id, Fecha, DNI_proveedor, DNI_comprador, Descripcion, Importe,Tipo)
VALUES
('1','2010-01-12','24178276A','24259283F','Procesadores', '2500', '0.21'),
('2','2011-05-21','24178283E','24259283Z','Nuevas tarjetas graficas', '4032', '0.21'),
('3','2012-07-01','74178283H','24459283P','Impuestos', '3400', '0.21'),
('4','2012-05-11','24178276A','24259283M','vehiculos', '9000', '0.21'),
('5','2012-10-09','24978283F','34259283Z','alquiler', '2500', '0.21'),
('6','2013-08-21','94178283L','54259283H','Nuevos procesadores', '3030', '0.21'),
('7','2018-12-20','84178283E','24266283Q','fuentes de alimentacion', '7000', '0.21'),
('8','2020-01-10','24178283E','24259283Z','Teclados', '8870', '0.21'),
('9','2020-03-17','24178283E','24259283F','Pantallas', '2134', '0.21'),
('10','2020-07-01','24188283M','84259283L','Baterias', '450', '0.21')
;


CREATE TABLE Cobrar (
       Pendiente VARCHAR(2) NOT NULL,
       Fecha DATE NOT NULL,
       DNI VARCHAR(20) NOT NULL,
       Id INT NOT NULL,
       PRIMARY KEY (DNI,Id),
       FOREIGN KEY (DNI) REFERENCES Cliente (DNI),
       FOREIGN KEY (Id) REFERENCES Factura (Id)
);

    
INSERT INTO Cobrar (Pendiente, Fecha, DNI, Id)
VALUES
('Si','2020-09-12','77373452A','1'),
('No','2020-10-21','F245-67-737','2'),
('Si','2020-11-01','88745653E','2'),
('No','2020-11-11','000866S38','3'),
('No','2020-11-09','7768003317HGHLLS','3')
;


CREATE TABLE Sueldo (
       Codigo INT NOT NULL AUTO_INCREMENT,
       Cantidad DOUBLE NOT NULL,
       
       PRIMARY KEY (Codigo)
);
INSERT INTO Sueldo (Codigo, Cantidad)
VALUES
('1','1550'),
('2','1750'),
('3','2100'),
('4','970'),
('5','1750'),
('6','2330'),
('7','1460'),
('8','1230'),
('9','1230'),
('10','1560')
;


CREATE TABLE Empleado (
    dni  VARCHAR(9) NOT NULL ,
    nombre VARCHAR(20) NOT NULL,
    apellidos VARCHAR(40) NOT NULL,
    telefono VARCHAR(9),
    direccion VARCHAR(50) ,
    direccionCentro VARCHAR(200) ,
    cuentaBancaria VARCHAR(200),
    
       PRIMARY KEY (dni),
    FOREIGN KEY (direccionCentro) REFERENCES centro (direccion)

);

    
INSERT INTO
Empleado (dni, nombre, apellidos, telefono, direccion, direccionCentro, cuentaBancaria)
VALUES
('24179283W','Victor', 'Castro', '893847348', 'Granada', 'Granada', '22'),
('24159283X','Laura ', 'Dominguez', '893847123', 'Granada', 'Malaga', '33'),
('39679283Y','Marcos', 'Parra', '128347348', 'Armilla', 'Jaen', '44'),
('15679299A','Miriam ', 'Lopez', '837103946', 'Armilla', 'Jaen','55'),
('65679333E','Paula ', 'Carretero', '558342348', 'Armilla', 'Granada','66'),
('11644283P','Josefa ', 'Hernandez', '722334548', 'Albolote', 'Malaga','77'),
('12399283T','Agustin ', 'Monedero', '736341938', 'Viznar', 'Malaga','88'),
('59259283A','Alejandro ', 'Gomez', '918267348', 'Armilla', 'Jaen','99'),
('91529385O','Maria ', 'Charriel', '182492759', 'Granada', 'Malaga','11'),
('73729938S','Rafael ', 'Montero', '823934293', 'Albolote', 'Almeria','00');

CREATE TABLE Recibir (
       Codigo INT NOT NULL,
    DNI VARCHAR(9) NOT NULL,
       PRIMARY KEY (Codigo),
     FOREIGN KEY (Codigo) REFERENCES Sueldo (Codigo)
	ON DELETE CASCADE,
     FOREIGN KEY (DNI) REFERENCES Empleado (dni)
	ON DELETE CASCADE
);
    
INSERT INTO Recibir (Codigo, dni)
VALUES
('1','24179283W'),
('2','39679283Y'),
('3','65679333E'),
('4','11644283P'),
('5','12399283T')
;

CREATE TABLE CalcularBeneficio (
Id INT NOT NULL,
Codigo INT NOT NULL,
    Beneficio INT,
       PRIMARY KEY (Id,Codigo),
FOREIGN KEY (Id) REFERENCES Factura (Id),
     FOREIGN KEY (Codigo) REFERENCES Sueldo (Codigo)
);
    
INSERT INTO CalcularBeneficio (Id,Codigo, Beneficio)
VALUES
('1','2','4250'),
('1','3','3200'),
('1','4','2200'),
('2','2','1100'),
('2','4','3450')
;







CREATE TABLE grupoEmpleados (
       nombre  VARCHAR(20) NOT NULL,
    
       PRIMARY KEY (nombre)

);

INSERT INTO
grupoEmpleados (nombre)
VALUES
('logistica'),
('recursosHumanos'),
('almacen'),
('contabilidad'),
('marketing');






CREATE TABLE perteneceEmpleado (
       nombre  VARCHAR(20) NOT NULL,
       dni VARCHAR(9) NOT NULL,
    
       PRIMARY KEY (nombre, dni),
    
    FOREIGN KEY (nombre) REFERENCES grupoEmpleados (nombre)
	ON DELETE CASCADE,
    FOREIGN KEY (dni) REFERENCES Empleado (dni)
	ON DELETE CASCADE
	
);



INSERT INTO
perteneceEmpleado (nombre, dni)
VALUES
('logistica', '24159283X'),
('recursosHumanos', '91529385O'),
('almacen', '39679283Y'),
('contabilidad', '15679299A'),
('logistica', '65679333E');



CREATE TABLE componente (
       idComp  INT NOT NULL AUTO_INCREMENT,
       nombre VARCHAR(60) NOT NULL,
       cantidad INT NOT NULL,
       lote VARCHAR(20),
       estado VARCHAR(100),
       PRIMARY KEY (idComp)
);


INSERT INTO
       componente (nombre,cantidad,lote,estado)
       VALUES ('Cargador ipad USB 12W 50cm','200','D185T16',NULL),
       ('Cargador iPad USB 12W 100cm','500','T496K84',NULL),
       ('Cargador iPad USB 12W 50cm','100','D185T17','Tiempo de carga 10% mayor'),
       ('MacBook Pro MWP42Y/A','350','YHD18YH21', NULL),
       ('MacBook Pro MWP42Y/A','270','D285Q39',NULL),
       ('iPad Air DTI27Y/C','1500','TJU24OP4',NULL),
       ('iPad Air DTI27Y/C','400','IJU18YB4','Defectuoso, no vender'),
       ('Pantalla iPhone XR','250',NULL,NULL),
       ('AirPods con estuche de carga','600','YFH34Y46',NULL),
       ('AirPods con estuche de carga','400','YFH34Y52',NULL),
       ('AirPods con estuche de carga rosa','400','YFH34Y53',NULL)  
;


CREATE TABLE estanteria (
    idEstanteria INT NOT NULL AUTO_INCREMENT,
    dirCentro VARCHAR(30) NOT NULL,
    zona VARCHAR(5) NOT NULL,
    alto INT,
    ancho INT,
    largo INT,
    PRIMARY KEY (idEstanteria),
    FOREIGN KEY (dirCentro) REFERENCES centro(direccion)
);

INSERT INTO estanteria (dirCentro,zona,alto,ancho,largo)
VALUES
('malaga','B4','425','195','1975'),
('malaga','B4',NULL,NULL,NULL),
('malaga','A12','320','385','650'),
('sevilla','A01','435','825','2250'),
('jaen','A01','415','250','1400'),
('madrid','T4',NULL,NULL,NULL),
('madrid','D21',NULL,'125','1000'),
('madrid','C2',NULL,'125','1350'),
('granada','G','250','250','750'),
('granada', 'A','300','285','1200')
;
       

CREATE TABLE almacenadoEn (
     idComp INT NOT NULL,
     idEstanteria INT NOT NULL,
     PRIMARY KEY (idComp,idEstanteria),
     FOREIGN KEY (idComp) REFERENCES componente(idComp),
     FOREIGN KEY (idEstanteria) REFERENCES estanteria(idEstanteria)
 );
 
 INSERT INTO almacenadoEn (idComp,idEstanteria) VALUES
 ('2','2'),
 ('2','3'),
 ('5','9'),
 ('10','4'),
 ('4','7'),
 ('8','7'),
 ('1','10')
 ;

