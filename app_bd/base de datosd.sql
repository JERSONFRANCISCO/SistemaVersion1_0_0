
EXEC pa_Departametos @Accion = 'I', @DEP_Titulo = 'DEPARTAMENTO DE TI3ee', @DEP_Observaciones='TECNOLOGIAS DE INFORMACIÓN', @DEP_Estado='A',@DEP_Departameto=0,@USR_Usuario_Creacion='Jerson'

SELECT * FROM DEPARTAMENTOS
delete from DEPARTAMENTOS
DBCC CHECKIDENT (DEPARTAMENTOS, reseed, 0);


EXEC pa_Departametos @Accion = 'U', @DEP_Titulo = 'DEPARTAMENTO DE TIADSAD', @DEP_Observaciones='TECNOLOGIAS DE INFORMACIÓN', @DEP_Estado='A',@DEP_Departameto=,@USR_Usuario_Creacion='Jerson'


create procedure pa_HiloTicet(
	@DEP_Titulo text
	)
	as
	begin
	insert into TICKET_detalle(TIC_TICKET,USR_Usuario,TIC_TItulo,tic_observaciones,TIC_Estado)
		values(2,'Jerson','ESTADO',@DEP_Titulo,'A');
end