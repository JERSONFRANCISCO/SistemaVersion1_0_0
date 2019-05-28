alter procedure pa_obtener_hilo_ticket( @tic_ticket int	)
	as
		begin
		select usr.USR_Nombre, det.TIC_titulo, det.tic_observaciones, CONVERT(VARCHAR, det.USR_Fecha_Creacion, 105)  
		from TICKET_detalle det
		inner join USUARIOS usr on (det.USR_Usuario = usr.USR_Usuario)
		where det.TIC_Ticket = @tic_ticket
		order by det.tic_detalle desc
end

alter procedure pa_obtener_tareas_ticket( @tic_ticket int	)
	as
		begin
		select	
			tar.TIC_Tareas ,
			tar.TIC_Titulo ,
			tar.TIC_Observaciones  ,
			tar.TIC_Minutos ,
			tar.TIC_Horas ,
			usr.USR_Nombre,
			tar.TIC_Estado 
		from TICKET_TAREAS  tar
		inner join USUARIOS usr on (tar.USR_Usuario = usr.USR_Usuario)
		where tar.TIC_Ticket = @tic_ticket
end