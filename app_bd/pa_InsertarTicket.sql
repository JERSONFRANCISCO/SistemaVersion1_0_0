alter procedure pa_InsertarTicket(
	@Accion varchar(2),
	@Prioridad VARCHAR(1),
	@Ven_Vendedor VARCHAR(50),
	@Cli_Cliente VARCHAR(10),
	@Pro_Proyecto VARCHAR(4),
	@Usr_usuario varchar(20),
	@TAL_Numero VARCHAR(20),
	@DEP_titulo varchar(100) ,
	@TIC_Estado varchar(1) ,
	@TIC_Titulo varchar(100),
	@TIC_Observaciones varchar(max),
	@USR_Usuario_Creacion varchar(20),
	@TIC_TICKET int,
	@TIC_HORAS INT,
	@TIC_MINUTOS INT
	)
as
DECLARE @DEP_DepartamentoID INT;
DECLARE @TIC_TICKET_ID INT;
DECLARE @USUARIO int;
begin
		if(@Accion = 'TI')
		begin
				select @DEP_DepartamentoID=DEPARTAMENTOS.DEP_Departamento  from dbo.DEPARTAMENTOS where DEPARTAMENTOS.DEP_Titulo = @DEP_titulo;
				select @USUARIO = USR_Usuario from USUARIOS where USUARIOS.USR_Nombre = @Usr_usuario
				
				insert into TICKET(Ven_Vendedor,Cli_Cliente,Pro_Proyecto,Tal_Numero,
									DEP_DEPARTAMENTO,TIC_Titulo,TIC_Observaciones,
				TIC_Estado,USR_Usuario_Creacion,TIC_Fecha_Vencimiento,TIC_Prioridad,USR_Usuario)
				values(@Ven_Vendedor,@Cli_Cliente,@Pro_Proyecto,@TAL_Numero,@DEP_DepartamentoID,@TIC_Titulo,'',@TIC_Estado,
				@USR_Usuario_Creacion,GETDATE(),@Prioridad,@USUARIO)

				SELECT TOP 1  @TIC_TICKET_ID = TIC_TICKET FROM TICKET where TICKET.TIC_Titulo = @TIC_Titulo ORDER BY TIC_TICKET DESC 
				if(LEN(@TIC_Observaciones) > 0 )
					begin
					insert into TICKET_DETALLE(TIC_TICKET,USR_Usuario,TIC_Titulo,TIC_Observaciones,TIC_Estado,USR_Usuario_Creacion)
					values(@TIC_TICKET_ID,@USUARIO,@TIC_Titulo,@TIC_Observaciones,@TIC_Estado,@USR_Usuario_Creacion)
					end
		end
		if(@Accion = 'TA')
		begin
				select @DEP_DepartamentoID=DEPARTAMENTOS.DEP_Departamento  from dbo.DEPARTAMENTOS where DEPARTAMENTOS.DEP_Titulo = @DEP_titulo;
				select @USUARIO = USR_Usuario from USUARIOS where USUARIOS.USR_Nombre = @Usr_usuario
				
				insert into TICKET_TAREAS(TIC_Ticket,DEP_Departamento,USR_Usuario,TIC_Titulo,TIC_Observaciones,TIC_Estado,TIC_Horas,TIC_Minutos,USR_Usuario_Creacion)
				values(@TIC_TICKET,@DEP_DepartamentoID,@USUARIO,@TIC_Titulo,@TIC_Observaciones,@TIC_Estado,@TIC_HORAS,@TIC_MINUTOS,@USR_Usuario_Creacion)
				
		end
end



alter procedure pa_IdTicket(
	@TIC_Titulo varchar(100)
	)
as
begin
	select top 1 TIC_Ticket from TICKET  where TIC_Titulo = @TIC_Titulo order by TICKET.TIC_Ticket desc
end
