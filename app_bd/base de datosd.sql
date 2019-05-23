

create procedure pa_HiloTicet(
	@DEP_Titulo text
	)
	as
	begin
	insert into TICKET_detalle(TIC_TICKET,USR_Usuario,TIC_TItulo,tic_observaciones,TIC_Estado)
		values(2,'Jerson','ESTADO',@DEP_Titulo,'A');
end







select * from CATALOGO
select * from CATALOGO_DETALLE 

insert into catalogo(cat_tabla,cat_estado) values('Prioridades','A')

insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','U','URGENTE','A')

insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','N','NORMAL','A')

insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','S','SIN URGENCIA','A')


insert into CATALOGO (cat_tabla,cat_estado) values ('Estados','A')

insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Estados','A','ACTIVO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Estados','I','INACTIVO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Estados','B','BORRADO','A')




select 
CaD.CAT_Descripcion,
Pri.CAT_Descripcion,
convert(varchar,tic.USR_Fecha_Creacion, 105) as USR_Fecha_Creacion,
convert(varchar,tic.TIC_Fecha_Vencimiento, 105) as TIC_Fecha_Vencimiento,
case when dep.DEP_Titulo is null then '' else dep.DEP_Titulo end as Departamento,
case when usr.USR_Nombre is null then '' else usr.USR_Nombre end as Titulo,
tic.USR_Usuario_Creacion,
tic.TIC_Titulo
from TICKET tic
inner join CATALOGO_DETALLE CaD on ( tic.TIC_Estado = CaD.CAT_Contraccion and CaD.CAT_Tabla = 'Estados')
inner join CATALOGO_DETALLE Pri on ( tic.TIC_Prioridad = Pri.CAT_Contraccion and Pri.CAT_Tabla = 'Prioridades')
left join DEPARTAMENTOS dep on ( tic.DEP_DEPARTAMENTO =dep.DEP_Departamento)
left join USUARIOS usr on (tic.USR_Usuario = usr.USR_Usuario)
