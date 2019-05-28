alter procedure pa_HiloTicket(
	@tic_ticket int ,
	@DEP_Titulo text,
	@Usr_usuario varchar(20)
	)
	as
	DECLARE @USUARIO int;
	begin
	select @USUARIO = USR_Usuario from USUARIOS where USUARIOS.USR_Nombre = @Usr_usuario
	insert into TICKET_detalle(TIC_TICKET,USR_Usuario,TIC_Titulo,tic_observaciones,TIC_Estado)
		values(@tic_ticket,@USUARIO,'',@DEP_Titulo,'A');
end