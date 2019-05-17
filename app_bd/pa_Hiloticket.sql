create procedure pa_HiloTicet(
	@DEP_Titulo text
	)
	as
	begin
	insert into TICKET_detalle(TIC_TICKET,USR_Usuario,TIC_TItulo,tic_observaciones,TIC_Estado)
		values(2,'Jerson','ESTADO',@DEP_Titulo,'A');
end