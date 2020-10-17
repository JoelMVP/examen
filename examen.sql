create database academico;
create table identificador (
    ci int primary key,
    nombreCompletp varchar(50),
    fechaNac date,
    LugarR varchar(2),
) -- datos
insert into alumno
values(1, 'mm', 'ss', '02', 99);
insert into alumno(id, nombre, depto, nota)
values(2, 'aa', '01', 99);
insert into alumno(id, apellido, depto, nota)


select id + 3,
    apellido,
    depto,
    nota -50
from alumno --despliegue


select *
from alumno
select *,
    case
        depto
        when '01' then 'CHUQUISACA'
        when '02' then 'LA PAZ'
        else 'OTRO'
    end as DEPTODESC,
    case
        when nota > 50 then 'APROBO'
        else 'REPROBO'
    end as notadesc
from alumno

select case 
        depto
        when '01' then 'CHUQUISACA'
        when '02' then 'LA PAZ'
        when '04' then 'CB'
        else 'OTRO' end as DEPTODESC,
        count(*)
from alumno
group by case 
        depto 
        when '01' then 'CHUQUISACA'
        when '02' then 'LA PAZ'
        when '04' then 'CB'
        else 'OTRO' end
        
select *,

select 
sum(case when depto='02' then 1 else 0 end) lp,
sum(case when depto='04' then 1 else 0 end) chq
from alumno

SELECT (a.LugarR),
    (case when a.LugarR like '01' then 'La Paz' 
        when a.LugarR like '02' then 'Cochabamba' 
        when a.LugarR like '03' then 'Santa Cruz' 
        when a.LugarR like '04' then 'Beni' 
        when a.LugarR like '05' then 'Oruro' 
        when a.LugarR like '06' then 'Potosi' 
        when a.LugarR like '07' then 'Tarija' 
        when a.LugarR like '08' then 'Chuquisaca' 
        when a.LugarR like '09' then 'Pando' end) Departamento 
FROM (SELECT ci,LugarR FROM identificador) as a, notas as n 
where a.ci like n.ci and n.nota > 50

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



select * from
(select
    case
        depto
        when '01' then 'CHUQUISACA'
        when '02' then 'LAPAZ'
        else 'OTRO'
    end as DEPTODESC,
    case
        when nota > 50 then 1
        else 0
    end as notadesc
from alumno
) as sales Pivot(sum(notadesc) For DEPTODESC in ([CHUQUISACA],[LAPAZ],[OTRO])) as pvt;
