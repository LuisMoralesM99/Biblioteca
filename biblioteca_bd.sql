drop database biblioteca;
create database biblioteca;
use biblioteca;

create table libros (
id int primary key auto_increment,
cantidad int,
titulo varchar(45),
autor varchar(45),
editorial varchar(45),
año int
);

create table usuarios (
id int primary key auto_increment,
nombre varchar(45),
ap_paterno varchar(45),
ap_materno varchar(45),
fec_nac date,
direccion varchar(45),
telefono int(10)
);

create table prestamos (
folio int primary key auto_increment,
estado varchar(45),
fec_salida date,
fec_devolucion date null,
user_id int,
libro_id int,
foreign key (user_id) references usuarios(id),
foreign key (libro_id) references libros(id)
);
