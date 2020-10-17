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
    nota float
);

--Introducir valores a las tablas
--identificador
--01->Chuquisaca
--02->La Paz
--03->Cochabamba
--04->Oruro
--05->Potosi
--06->Tarija
--07->Santa Cruz
--08->Beni
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
--Respuesta del 2 sum
SELECT
    sum(case when a.LugarR like '01' then 1 else 0 end) LaPaz,
    sum(case when a.LugarR like '02' then 1 else 0 end) Cochabamba,
    sum(case when a.LugarR like '03' then 1 else 0 end) SantaCruz,
    sum(case when a.LugarR like '04' then 1 else 0 end) Beni,
    sum(case when a.LugarR like '05' then 1 else 0 end) Oruro,
    sum(case when a.LugarR like '06' then 1 else 0 end) Potosi,
    sum(case when a.LugarR like '07' then 1 else 0 end) Tarija,
    sum(case when a.LugarR like '08' then 1 else 0 end) Chuquisaca,
    sum(case when a.LugarR like '09' then 1 else 0 end) Pando
FROM (SELECT ci,LugarR FROM identificador) as a, notas as n 
where a.ci like n.ci and n.nota > 50
--Respuesta del 2 pivot
select * from
(select
    (case when a.LugarR like '01' then 'La Paz' 
        when a.LugarR like '02' then 'Cochabamba' 
        when a.LugarR like '03' then 'Santa Cruz' 
        when a.LugarR like '04' then 'Beni' 
        when a.LugarR like '05' then 'Oruro' 
        when a.LugarR like '06' then 'Potosi' 
        when a.LugarR like '07' then 'Tarija' 
        when a.LugarR like '08' then 'Chuquisaca' 
        when a.LugarR like '09' then 'Pando' end) Departamento,
	(case when n.nota > 50 then 1 else 0 end) as app
FROM (select ci,LugarR from identificador) as a, notas as n 
where a.ci like n.ci) as aprovados
Pivot(sum(app) For Departamento in ([La Paz],
									[Cochabamba],
									[Santa Cruz],
									[Beni],
									[Oruro],
									[Potosi],
									[Tarija],
									[Chuquisaca],
									[Pando])) as pvt;