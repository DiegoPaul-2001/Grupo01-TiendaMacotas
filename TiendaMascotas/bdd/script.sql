create table mascotas(
    id int(11) not null auto_increment primary key,
    especie varchar(200) not null,
    raza varchar(200) not null,
    detalle varchar(500) not null,
    fechaNcimiento datetime not null,
    estado enum('1','0'),--1 disponible y 0 no disponible
    rutaFoto varchar(200)

);

insert into mascotas values
('','canino','chiguagua','En este listado hemos reunido los nombres para mascotas - perros más usados por nuestros usuarios. Veras los nombres más típicos para perros como Toby, nombres largos y cortos.','31/04/2021','1','img/archivos/foto1.jpg'),
('','canino','terrier','En este listado hemos reunido los nombres para mascotas - perros más usados por nuestros usuarios. Veras los nombres más típicos para perros como Toby, nombres largos y cortos.','31/04/2021','1','img/archivos/foto2.jpg'),
('','canino','pitbull','En este listado hemos reunido los nombres para mascotas - perros más usados por nuestros usuarios. Veras los nombres más típicos para perros como Toby, nombres largos y cortos.','31/04/2021','1','img/archivos/foto3.jpg'),
('','Felis catus','gato','En este listado hemos reunido los nombres para mascotas - perros más usados por nuestros usuarios. Veras los nombres más típicos para perros como Toby, nombres largos y cortos.','31/04/2021','1','img/archivos/foto4.jpg'),
('','canino','scoot','En este listado hemos reunido los nombres para mascotas - perros más usados por nuestros usuarios. Veras los nombres más típicos para perros como Toby, nombres largos y cortos.','31/04/2021','1','img/archivos/foto5.jpg');
