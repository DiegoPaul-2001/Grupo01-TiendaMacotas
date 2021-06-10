create table mascotas(
    id int(11) not null auto_increment primary key,
    especie varchar(200) not null,
    raza varchar(200) not null,
    detalle varchar(500) not null,
    fechaNacimiento datetime not null,
    estado enum('1','0'),
    rutaFoto varchar(200)
);
/*1 disponible 0 no disponible*/

insert into mascotas values
('','canino','akita','Una raza de perro o raza canina es un grupo de perros que tienen características muy similares o casi idénticas en su aspecto o comportamiento o generalmente en ambos, sobre todo porque vienen de un sistema selecto de antepasados que tenían las mismas características.','2021-05-31','1','img/archivos/foto1.jpg'),
('','canino','terrier','Una raza de perro o raza canina es un grupo de perros que tienen características muy similares o casi idénticas en su aspecto o comportamiento o generalmente en ambos, sobre todo porque vienen de un sistema selecto de antepasados que tenían las mismas características.','2021-05-31','1','img/archivos/foto2.jpg'),
('','canino','pitbull','Una raza de perro o raza canina es un grupo de perros que tienen características muy similares o casi idénticas en su aspecto o comportamiento o generalmente en ambos, sobre todo porque vienen de un sistema selecto de antepasados que tenían las mismas características.','2021-05-31','1','img/archivos/foto3.jpg'),
('','Oryctolagus cuniculus','conejo','Una raza de perro o raza canina es un grupo de perros que tienen características muy similares o casi idénticas en su aspecto o comportamiento o generalmente en ambos, sobre todo porque vienen de un sistema selecto de antepasados que tenían las mismas características.','2021-05-31','1','img/archivos/foto4.jpg'),
('','Felis catus','gato','Una raza de perro o raza canina es un grupo de perros que tienen características muy similares o casi idénticas en su aspecto o comportamiento o generalmente en ambos, sobre todo porque vienen de un sistema selecto de antepasados que tenían las mismas características.','2021-05-31','1','img/archivos/foto5.jpg');