

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
tic.TIC_Titulo,
case when Ven.VEN_Nombre is null then '' else Ven.VEN_Nombre end as VEN_Nombre,
case when cli.cli_nombre is null then '' else cli.cli_nombre end as cli_nombre,
case when pro.PRO_Nombre is null then '' else pro.PRO_Nombre end as PRO_Nombre,
case when tal.TAL_Descripcion is null then '' else tal.TAL_Descripcion end as TAL_Descripcion
from TICKET tic
inner join CATALOGO_DETALLE CaD on ( tic.TIC_Estado = CaD.CAT_Contraccion and CaD.CAT_Tabla = 'Estados')
inner join CATALOGO_DETALLE Pri on ( tic.TIC_Prioridad = Pri.CAT_Contraccion and Pri.CAT_Tabla = 'Prioridades')
left join DEPARTAMENTOS dep on ( tic.DEP_DEPARTAMENTO =dep.DEP_Departamento)
left join USUARIOS usr on (tic.USR_Usuario = usr.USR_Usuario)
LEFT JOIN SABIOTERRA..VEN_VENDEDORES Ven on (  ven.Ven_vendedor COLLATE DATABASE_DEFAULT = tic.ven_vendedor)
LEFT JOIN SABIOTERRA..CLI_CLIENTES cli on (  cli.CLI_Cliente COLLATE DATABASE_DEFAULT = tic.CLI_Cliente)
LEFT JOIN SABIOTERRA..PRO_PROYECTOS pro on ( tic.Pro_Proyecto COLLATE DATABASE_DEFAULT = pro.PRO_Proyecto and cli.CLI_Cliente = pro.CLI_Cliente)
left join SABIOTERRA..ALQ_TALLER tal on (tal.tal_numero =  tic.Tal_Numero )
