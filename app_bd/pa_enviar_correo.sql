alter procedure pa_enviar_correo(
	@Accion varchar(6),
	@tic_ticket int
)
as
declare @tareas_cantidad  int
set @tareas_cantidad = 0
begin
		if(@Accion = 'SELECT')
		begin
			select @tareas_cantidad=COUNT(*)  from TICKET_TAREAS where TIC_TICKET = @tic_ticket

			select  CaD.CAT_Descripcion, Pri.CAT_Descripcion, convert(varchar,tic.USR_Fecha_Creacion, 105) as USR_Fecha_Creacion,
			convert(varchar,tic.TIC_Fecha_Vencimiento, 105) as TIC_Fecha_Vencimiento,
			case when dep.DEP_Titulo is null then '' else dep.DEP_Titulo end as Departamento,
			case when usr.USR_Nombre is null then '' else usr.USR_Nombre end as NombreUsuario,
			tic.USR_Usuario_Creacion,
			tic.TIC_Titulo,
			case when tic.Ven_Vendedor is null then 'N/D' else tic.Ven_Vendedor end as VEN_Nombre,
			case when tic.Cli_Cliente is null then 'N/D' else tic.Cli_Cliente  end as cli_nombre,
			case when tic.Pro_nombre is null then 'N/D' else tic.Pro_nombre end as PRO_Nombre,
			case when tic.Tal_Descripcion is null then 'N/D' else tic.Tal_Descripcion end as TAL_Descripcion,@tareas_cantidad as CantTask,
			tar.TIC_Tareas ,tar.TIC_Titulo ,tar.TIC_Observaciones ,tar.TIC_Minutos , tar.TIC_Horas,	usrTicket.USR_Nombre
			from TICKET tic
			inner join CATALOGO_DETALLE CaD on ( tic.TIC_Estado = CaD.CAT_Contraccion and CaD.CAT_Tabla = 'Estados')
			inner join CATALOGO_DETALLE Pri on ( tic.TIC_Prioridad = Pri.CAT_Contraccion and Pri.CAT_Tabla = 'Prioridades')
			left join DEPARTAMENTOS dep on ( tic.DEP_DEPARTAMENTO =dep.DEP_Departamento)
			left join USUARIOS usr on (tic.USR_Usuario = usr.USR_Usuario)
			left join TICKET_TAREAS tar on (tic.TIC_Ticket = tar.TIC_Ticket)
			left join USUARIOS usrTicket on (tar.USR_Usuario = usrTicket.USR_Usuario)
			where tic.TIC_Ticket =@tic_ticket;
		end
		if(@Accion = 'MAILS')
		begin
			with correos as(
				select USR_Correo from TICKET t
				inner join USUARIOS u on (t.USR_Usuario = u.USR_Usuario) 
				where TIC_Ticket = @tic_ticket
					union all
				select USR_Correo from TICKET_TAREAS t
				inner join USUARIOS u on (t.USR_Usuario = u.USR_Usuario)
				where TIC_Ticket = @tic_ticket
			)
			select USR_Correo from correos group by USR_Correo
		end
end
