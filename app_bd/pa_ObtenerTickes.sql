ALTER procedure pa_ObtenerTickes(
	@Estado varchar(1),
	@Usr_Usuario int
)as
DECLARE @ROL varchar(1);
DECLARE @DEPARTAMENTO varchar(1);
begin 
	select @ROL =USR_ROL from USUARIOS where USR_Usuario = @Usr_Usuario;
	
	if(@ROL = 'A')
		begin
			Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 103) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
			CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
			case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
			from TICKET TIC
			LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
			LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
			where TIC.TIC_Estado = @Estado
			order by TIC_Ticket desc
	end
	if(@ROL = 'J')
		begin
			SELECT  @DEPARTAMENTO = DEP_Departamento FROM USUARIOS USR
			INNER JOIN GRUPO GRU on (USR.GRU_Grupo = gru.GRU_Grupo)
			WHERE USR.USR_Usuario = @Usr_Usuario;
			WITH TICKETS AS (
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 103) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,
				CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC_Estado = 'A' AND TIC.DEP_DEPARTAMENTO = @DEPARTAMENTO
			UNION
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 103) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				INNER JOIN TICKET_TAREAS TASK ON ( TIC.TIC_Ticket = TASK.TIC_Ticket)
				where TIC.TIC_Estado = 'A' AND TASK.DEP_Departamento = @DEPARTAMENTO
			UNION -- tickets de usuarios del deparamento
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 103) as FechaCreacion ,TIC.TIC_Titulo,DEPTIC.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario)
				INNER JOIN GRUPO GRU ON (USR.GRU_Grupo = GRU.GRU_Grupo) 
				LEFT JOIN DEPARTAMENTOS DEP ON (GRU.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				LEFT JOIN DEPARTAMENTOS DEPTIC ON (TIC.DEP_DEPARTAMENTO = DEPTIC.DEP_Departamento) 
				--INNER JOIN TICKET_TAREAS TASK ON ( TIC.TIC_Ticket = TASK.TIC_Ticket)
				where TIC.TIC_Estado = @Estado AND TIC.DEP_Departamento <> @DEPARTAMENTO
			)
			SELECT * FROM TICKETS ORDER BY  TIC_Ticket desc;
	end
	if(@ROL = 'U')
		begin
			WITH TICKETS AS (
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 103) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC_Estado = @Estado AND TIC.USR_Usuario = @Usr_Usuario
			UNION
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 103) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				INNER JOIN TICKET_TAREAS TASK ON ( TIC.TIC_Ticket = TASK.TIC_Ticket)
				where TIC.TIC_Estado = @Estado AND TASK.USR_Usuario = @Usr_Usuario
			)
			SELECT * FROM TICKETS ORDER BY  TIC_Ticket desc;
	end
end







------------------------------------
---pantalla de tickets (paginación)
------------------------------------




ALTER procedure pa_ObtenerTickes_PAGINACION(
	@Estado varchar(1),
	@Usr_Usuario int,
	@INICIA int,
	@CANTIDAD int
)as
DECLARE @ROL varchar(1);
DECLARE @DEPARTAMENTO varchar(1);
begin 
	select @ROL=USR_ROL from USUARIOS where USR_Usuario = @Usr_Usuario;
	
	if(@ROL = 'A')
		begin
			WITH TICKETS AS(
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 111) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC.TIC_Estado = @Estado
			)
     		SELECT * FROM TICKETS 	ORDER BY  TIC_Ticket desc 	OFFSET @INICIA ROWS	FETCH NEXT @CANTIDAD ROWS ONLY;
	end
	if(@ROL = 'J')
		begin
			SELECT  @DEPARTAMENTO = DEP_Departamento FROM USUARIOS USR
			INNER JOIN GRUPO GRU on (USR.GRU_Grupo = gru.GRU_Grupo)
			WHERE USR.USR_Usuario = @Usr_Usuario;
			WITH TICKETS AS (
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 111) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,
				CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC_Estado = 'A' AND TIC.DEP_DEPARTAMENTO = @DEPARTAMENTO
			UNION
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 111) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				INNER JOIN TICKET_TAREAS TASK ON ( TIC.TIC_Ticket = TASK.TIC_Ticket)
				where TIC.TIC_Estado = 'A' AND TASK.DEP_Departamento = @DEPARTAMENTO
			UNION -- tickets de usuarios del deparamento
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 111) as FechaCreacion ,TIC.TIC_Titulo,DEPTIC.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario)
				INNER JOIN GRUPO GRU ON (USR.GRU_Grupo = GRU.GRU_Grupo) 
				LEFT JOIN DEPARTAMENTOS DEP ON (GRU.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				LEFT JOIN DEPARTAMENTOS DEPTIC ON (TIC.DEP_DEPARTAMENTO = DEPTIC.DEP_Departamento) 
				where TIC.TIC_Estado = @Estado AND TIC.DEP_Departamento <> @DEPARTAMENTO
			)
			SELECT * FROM TICKETS ORDER BY  TIC_Ticket desc	OFFSET @INICIA ROWS	FETCH NEXT @CANTIDAD ROWS ONLY;
	end
	if(@ROL = 'U')
		begin
			WITH TICKETS AS (
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 111) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC_Estado = @Estado AND TIC.USR_Usuario = @Usr_Usuario
			UNION
				Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 111) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
				CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
				case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				INNER JOIN TICKET_TAREAS TASK ON ( TIC.TIC_Ticket = TASK.TIC_Ticket)
				where TIC.TIC_Estado = @Estado AND TASK.USR_Usuario = @Usr_Usuario
			)
			SELECT * FROM TICKETS ORDER BY  TIC_Ticket desc	OFFSET @INICIA ROWS	FETCH NEXT @CANTIDAD ROWS ONLY;
	end
end



---------------------------
CREATE procedure pa_ObtenerTOTALTickes_PAGINACION(
	@Estado varchar(1),
	@Usr_Usuario int,
	@INICIA int,
	@CANTIDAD int
)as
DECLARE @ROL varchar(1);
DECLARE @DEPARTAMENTO varchar(1);
begin 
	select @ROL=USR_ROL from USUARIOS where USR_Usuario = @Usr_Usuario;
	
	if(@ROL = 'A')
		begin
			WITH TICKETS AS(
				Select TIC.TIC_Ticket
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC.TIC_Estado = @Estado
			)
     		SELECT COUNT(*) FROM TICKETS ;
	end
	if(@ROL = 'J')
		begin
			SELECT  @DEPARTAMENTO = DEP_Departamento FROM USUARIOS USR
			INNER JOIN GRUPO GRU on (USR.GRU_Grupo = gru.GRU_Grupo)
			WHERE USR.USR_Usuario = @Usr_Usuario;
			WITH TICKETS AS (
				Select TIC.TIC_Ticket
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC_Estado = 'A' AND TIC.DEP_DEPARTAMENTO = @DEPARTAMENTO
			UNION
				Select TIC.TIC_Ticket
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				INNER JOIN TICKET_TAREAS TASK ON ( TIC.TIC_Ticket = TASK.TIC_Ticket)
				where TIC.TIC_Estado = 'A' AND TASK.DEP_Departamento = @DEPARTAMENTO
			UNION -- tickets de usuarios del deparamento
				Select TIC.TIC_Ticket
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario)
				INNER JOIN GRUPO GRU ON (USR.GRU_Grupo = GRU.GRU_Grupo) 
				LEFT JOIN DEPARTAMENTOS DEP ON (GRU.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				LEFT JOIN DEPARTAMENTOS DEPTIC ON (TIC.DEP_DEPARTAMENTO = DEPTIC.DEP_Departamento) 
				where TIC.TIC_Estado = @Estado AND TIC.DEP_Departamento <> @DEPARTAMENTO
			)
			SELECT COUNT(*) FROM TICKETS ;
	end
	if(@ROL = 'U')
		begin
			WITH TICKETS AS (
				Select TIC.TIC_Ticket
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				where TIC_Estado = @Estado AND TIC.USR_Usuario = @Usr_Usuario
			UNION
				Select TIC.TIC_Ticket
				from TICKET TIC
				LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
				LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
				INNER JOIN TICKET_TAREAS TASK ON ( TIC.TIC_Ticket = TASK.TIC_Ticket)
				where TIC.TIC_Estado = @Estado AND TASK.USR_Usuario = @Usr_Usuario
			)
			SELECT COUNT(*) FROM TICKETS ;
	end
end
