
alter procedure pa_informacion_ticket(
	@tic_ticket int
)
as
begin
select  CaD.CAT_Descripcion, Pri.CAT_Descripcion, convert(varchar,tic.USR_Fecha_Creacion, 105) as USR_Fecha_Creacion,
		convert(varchar,tic.TIC_Fecha_Vencimiento, 105) as TIC_Fecha_Vencimiento,
		case when dep.DEP_Titulo is null then '' else dep.DEP_Titulo end as Departamento,
		case when usr.USR_Nombre is null then '' else usr.USR_Nombre end as NombreUsuario,
		tic.USR_Usuario_Creacion,
		tic.TIC_Titulo,
		case when tic.Ven_Vendedor is null then 'N/D' else tic.Ven_Vendedor end as VEN_Nombre,
		case when tic.Cli_Cliente is null then 'N/D' else tic.Cli_Cliente  end as cli_nombre,
		case when tic.Pro_nombre is null then 'N/D' else tic.Pro_nombre end as PRO_Nombre,
		case when tic.Tal_Descripcion is null then 'N/D' else tic.Tal_Descripcion end as TAL_Descripcion
		from TICKET tic
		inner join CATALOGO_DETALLE CaD on ( tic.TIC_Estado = CaD.CAT_Contraccion and CaD.CAT_Tabla = 'Estados')
		inner join CATALOGO_DETALLE Pri on ( tic.TIC_Prioridad = Pri.CAT_Contraccion and Pri.CAT_Tabla = 'Prioridades')
		left join DEPARTAMENTOS dep on ( tic.DEP_DEPARTAMENTO =dep.DEP_Departamento)
		left join USUARIOS usr on (tic.USR_Usuario = usr.USR_Usuario)
		where tic.TIC_Ticket = @tic_ticket;
end


/*
alter procedure pa_informacion_ticket(
	@tic_ticket int
)
as
begin
select  CaD.CAT_Descripcion, Pri.CAT_Descripcion, convert(varchar,tic.USR_Fecha_Creacion, 105) as USR_Fecha_Creacion,
		convert(varchar,tic.TIC_Fecha_Vencimiento, 105) as TIC_Fecha_Vencimiento,
		case when dep.DEP_Titulo is null then '' else dep.DEP_Titulo end as Departamento,
		case when usr.USR_Nombre is null then '' else usr.USR_Nombre end as NombreUsuario,
		tic.USR_Usuario_Creacion,
		tic.TIC_Titulo,
		case when Ven.VEN_Nombre is null then 'N/D' else Ven.VEN_Nombre end as VEN_Nombre,
		case when cli.cli_nombre is null then 'N/D' else cli.cli_nombre end as cli_nombre,
		case when pro.PRO_Nombre is null then 'N/D' else pro.PRO_Nombre end as PRO_Nombre,
		case when tal.TAL_Descripcion is null then 'N/D' else tal.TAL_Descripcion end as TAL_Descripcion
		from TICKET tic
		inner join CATALOGO_DETALLE CaD on ( tic.TIC_Estado = CaD.CAT_Contraccion and CaD.CAT_Tabla = 'Estados')
		inner join CATALOGO_DETALLE Pri on ( tic.TIC_Prioridad = Pri.CAT_Contraccion and Pri.CAT_Tabla = 'Prioridades')
		left join DEPARTAMENTOS dep on ( tic.DEP_DEPARTAMENTO =dep.DEP_Departamento)
		left join USUARIOS usr on (tic.USR_Usuario = usr.USR_Usuario)
		LEFT JOIN SABIO..VEN_VENDEDORES Ven on (  ven.Ven_vendedor COLLATE DATABASE_DEFAULT = tic.ven_vendedor)
		LEFT JOIN SABIO..CLI_CLIENTES cli on (  cli.CLI_Cliente COLLATE DATABASE_DEFAULT = tic.CLI_Cliente)
		LEFT JOIN SABIO..PRO_PROYECTOS pro on ( tic.Pro_Proyecto COLLATE DATABASE_DEFAULT = pro.PRO_Proyecto and cli.CLI_Cliente = pro.CLI_Cliente)
		left join SABIO..ALQ_TALLER tal on (tal.tal_numero =  tic.Tal_Numero )
		where tic.TIC_Ticket = @tic_ticket;
end

*/