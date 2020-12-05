USE ROSELLIPC;

CREATE TABLE vehiculo (
       id  INT NOT NULL AUTO_INCREMENT,
       name VARCHAR(100) NOT NULL,
       PRIMARY KEY (id)
);


INSERT INTO
       vehiculo (name)
       VALUES ('cochecillo'), ('furgonetilla'); 
