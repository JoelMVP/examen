--Para crear la BD
create database academico;
--Para crear las tablas
CREATE TABLE identificador (
    ci int primary key NOT NULL,
    nombreC varchar(50),
    fechaNac date,
    LugarR varchar(2)
);
CREATE TABLE usuario (
    ci int primary key NOT NULL,
    clave varchar(30),
    login int,
    imagen varchar(30),
    color varchar(30)
);
CREATE TABLE notas (
    id int primary key AUTO_INCREMENT,
    ci int,
    materia varchar(30),
    nota int
);

--Introducir valores a las tablas
--identificador
insert into identificador values 
(28340389,'ANTONIO PORTILLA TORRECILLA','1992-04-02','BE'),
(03751440,'AURORA BRU TORRES','1980-02-20','LP'),
(47605978,'FERNANDO SEPULVEDA POPA','1998-06-15','LP'),
(16374766,'MARIA ROSARIO CORRAL SOLER','1994-08-11','BE'),
(41079811,'JORGE IZAGUIRRE MELLADO','1996-10-06','CH'),
(68251361,'JOSEFA BELLON VALERO','1995-11-02','SC');

--usuario
insert into usuario values 
(28340389, '8289', 28340389, 'img.jpg', '1'),
(03751440, '5208', 03751440, 'img.jpg', '1'),
(47605978, '2103', 47605978, 'img.jpg', '1'),
(16374766, '5287', 16374766, 'img.jpg', '1'),
(41079811, '6007', 41079811, 'img.jpg', '1'),
(68251361, '4129', 68251361, 'img.jpg', '1');

--notas
insert into notas (ci, materia, nota) values 
(28340389, 'INF-111', '11'),
(28340389, 'INF-112', '79'),
(03751440, 'INF-121', '87'),
(03751440, 'INF-123', '64'),
(47605978, 'INF-133', '86'),
(47605978, 'INF-132', '77'),
(16374766, 'INF-111', '92'),
(16374766, 'INF-116', '22'),
(41079811, 'INF-143', '47'),
(41079811, 'INF-141', '23'),
(68251361, 'INF-161', '27'),
(68251361, 'INF-162', '53');

