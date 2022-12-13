create database hospital;
use hospital;

CREATE TABLE paciente (
    id int primary key auto_increment,
    nombre varchar(45),
    nacimiento date,
    peso float
);

INSERT INTO paciente VALUES ('1','Lorena Aranda', '2001/09/27', '55.6');
INSERT INTO paciente VALUES ('2', 'Pepe Lopez', '1965/02/13', '89.3');
INSERT INTO paciente VALUES ('3', 'Rocio Alonso', '1989/12/25', '60.5');