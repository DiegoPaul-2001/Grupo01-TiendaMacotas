create table mascotas(
    id int(11) not null auto_increment primary key,
    especie varchar(200) not null,
    raza varchar (200) not null,
    descripcion varchar(500) not null,
    fechaNacimiento datetime not null,
    estado enum('1','0'),--1 disponible, 0 no disponible enum sirve para agregar 2 valores que es 1 y 0
    rutaFoto varchar(200)
)
insert into mascotas values ('','golden','golus','asi medio cafesito y peludo','2020/11/12','1','img/archivos/foto1.jpg');
insert into mascotas values ('','gatus','gota lik','tipo tigre y travieso','2020/09/10','1','img/archivos/foto2.jpg');
insert into mascotas values ('','golden','golus','medio cafesito y peludo','2020/11/12','1','img/archivos/foto3.jpg');
insert into mascotas values ('','conejillos','indi cuy','comida ecuatoriana','2021/04/12','1','img/archivos/foto4.jpg');

alter table mascotas
add column precio float(10,2);