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


/*
create procedure pa_HiloTicet(
	@DEP_Titulo text
	)
	as
	begin
	insert into TICKET_detalle(TIC_TICKET,USR_Usuario,TIC_TItulo,tic_observaciones,TIC_Estado)
		values(2,'Jerson','ESTADO',@DEP_Titulo,'A');
end
*/

