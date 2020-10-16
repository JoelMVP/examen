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