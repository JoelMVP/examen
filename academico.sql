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
SELECT a.ci,(a.lugarnaci),nota,materia
FROM (SELECT ci,lugarnaci
FROM identificador) as a, notas as n
where a.ci like n.ci

SELECT a.ci,(a.lugarnaci),nota,materia
FROM (SELECT ci,lugarnaci
FROM identificador) as a, notas as n
where a.ci like n.ci
--Introducir valores a las tablas
--identificador
--01->La Paz
--02->Cochabamba
--03->Santa Cruz
--04->Beni
--05->Oruro
--06->Potosi
--07->Tarija
--08->Chuquisaca
--09->Pando
insert into identificador values 
(28340389,'ANTONIO PORTILLA TORRECILLA','1992-04-02','04'),
(03751440,'AURORA BRU TORRES','1980-02-20','01'),
(47605978,'FERNANDO SEPULVEDA POPA','1998-06-15','01'),
(16374766,'MARIA ROSARIO CORRAL SOLER','1994-08-11','04'),
(41079811,'JORGE IZAGUIRRE MELLADO','1996-10-06','02'),
(68251361,'JOSEFA BELLON VALERO','1995-11-02','03');

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


--consultas
SELECT COUNT(*),LugarR FROM notas as n,identificador as i WHERE n.ci like i.ci GROUP BY LugarR;
SELECT * from notas as n WHERE n.nota > 50;
SELECT COUNT(*),LugarR FROM notas as n,identificador as i WHERE n.ci like i.ci AND n.nota > 50 GROUP BY LugarR;

SELECT ci,
(case 
	when i.LugarR like '01' then 'La Paz'
	when i.LugarR like '02' then 'Cochabamba'
 	when i.LugarR like '03' then 'Santa Cruz'
 	when i.LugarR like '04' then 'Beni'
 	when i.LugarR like '05' then 'Oruro'
 	when i.LugarR like '06' then 'Potosi'
 	when i.LugarR like '07' then 'Tarija'
 	when i.LugarR like '08' then 'Chuquisaca'
 	when i.LugarR like '09' then 'Pando'
	end) as depto
FROM identificador as i;

SELECT count(a.LugarR) cantidad,(a.LugarR),(case 
	when a.LugarR like '01' then 'La Paz'
	when a.LugarR like '02' then 'Cochabamba'
 	when a.LugarR like '03' then 'Santa Cruz'
 	when a.LugarR like '04' then 'Beni'
 	when a.LugarR like '05' then 'Oruro'
 	when a.LugarR like '06' then 'Potosi'
 	when a.LugarR like '07' then 'Tarija'
 	when a.LugarR like '08' then 'Chuquisaca'
 	when a.LugarR like '09' then 'Pando'
	end) Departamento
FROM (SELECT ci,LugarR
FROM identificador) as a, notas as n
where a.ci like n.ci
and n.nota > 50
GROUP by a.LugarR;



SELECT COUNT(i.LugarR),n.ci,i.nombreC,n.nota 
FROM notas as n,identificador as i 
WHERE n.nota > 50 AND i.ci LIKE n.ci GROUP BY i.LugarR;
