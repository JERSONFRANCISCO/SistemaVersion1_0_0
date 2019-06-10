alter procedure pa_HiloTicket(
	@tic_ticket int ,
	@DEP_Titulo text,
	@Usr_usuario int
	)
	as
	begin
	insert into TICKET_detalle(TIC_TICKET,USR_Usuario,TIC_Titulo,tic_observaciones,TIC_Estado)
		values(@tic_ticket,@Usr_usuario,'',@DEP_Titulo,'A');
end