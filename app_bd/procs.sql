/*       */
	-- ejecucion para guardar
	EXEC pa_Departametos 
	@Accion = 'I',
	@DEP_Departameto=0,
	@DEP_Titulo = 'MANTEMINIEMTO',
	@DEP_Observaciones='DEPARTAMENTO DE MANTENIMIENTO',
	@DEP_Estado='A',
	@USR_Usuario_Creacion='JHIDALGO'
	
	-- ejecucion para consultar todos los registros
	EXEC pa_Departametos 
	@Accion = 'S',
	@DEP_Departameto=0,
	@DEP_Titulo = '',
	@DEP_Observaciones='',
	@DEP_Estado='A',
	@USR_Usuario_Creacion=''

	EXEC pa_Departametos 
	@Accion = 'U',
	@DEP_Departameto=1,
	@DEP_Titulo = 'TECNOLOGÍA DE INFORMACIÓN',
	@DEP_Observaciones='Departamento encargado de TI',
	@DEP_Estado='A',
	@USR_Usuario_Creacion='JERSONHIDALGO'


	--DROP PROCEDURE pa_Departametos
	alter procedure pa_Departametos
		@Accion varchar(1),
		@DEP_Departameto int,
		@DEP_Titulo varchar(50),
		@DEP_Observaciones varchar(100),
		@DEP_Estado varchar(1),
		@USR_Usuario_Creacion VARCHAR(20)
	AS
	BEGIN TRANSACTION

	IF @Accion = 'I'
		BEGIN
			INSERT INTO DEPARTAMENTOS(DEP_Titulo,DEP_Observaciones,DEP_Estado,USR_Usuario_Creacion)
			VALUES(@DEP_Titulo,@DEP_Observaciones,@DEP_Estado,@USR_Usuario_Creacion);
			IF @@ERROR <> 0
				BEGIN
					ROLLBACK TRANSACTION
					RAISERROR ('Error.', 16, 1)
					RETURN
				END
		END
	ELSE
		IF @Accion = 'S'
			BEGIN
				SELECT Dep.DEP_Departamento,DEP.DEP_Titulo,
						DEP.DEP_Observaciones,case when DEP.DEP_Estado = 'A' then 'ACTIVO' else 'INACTIVO' end,
						CONVERT(VARCHAR(10), DEP.USR_Fecha_Creacion, 103) AS USR_Fecha_Creacion
				FROM DEPARTAMENTOS DEP
				WHERE DEP.DEP_Estado IN ( 'A' , 'I' )
			END
	ELSE
			if(@Accion = 'F')
		begin
			SELECT DEP_Departamento,DEP_Titulo,DEP_Observaciones,DEP_Estado FROM DEPARTAMENTOS WHERE DEPARTAMENTOS.DEP_Departamento = @DEP_Departameto;
		end
	if(@Accion = 'U')
		begin
			update DEPARTAMENTOS
			set DEP_Estado = @DEP_Estado,
			DEP_Titulo = @DEP_Titulo,
			DEP_Observaciones = @DEP_Observaciones,
			USR_Usuario_Modificacion = @USR_Usuario_Creacion,
			USR_Fecha_Modificacion = GETDATE()
			where DEP_Departamento = @DEP_Departameto;
		end	
	IF @@ERROR <> 0
	BEGIN
		ROLLBACK TRANSACTION
		RAISERROR ('Error.', 16, 1)
		RETURN
	END
	commit TRANSACTION
GO
-------------------
	EXEC pa_Grupos 
	@Accion = 'S',
	@GRU_Titulo = '',
	@GRU_Observaciones='',
	@GRU_Estado='A',
	@DEP_Departamento=0,
	@USR_Usuario_Creacion=''

	EXEC pa_Grupos 
	@Accion = 'I',
	@GRU_Titulo = 'DESARROLLO TI',
	@GRU_Observaciones='DESARROLLO DE SOFTWARE',
	@GRU_Estado='A',
	@DEP_Departamento=1,
	@USR_Usuario_Creacion='JHIDALGO'
-------------------

	create procedure pa_Grupos
		@Accion varchar(1),
		@GRU_Titulo varchar(50),
		@GRU_Observaciones varchar(100),
		@GRU_Estado varchar(1),
		@DEP_Departamento int,
		@USR_Usuario_Creacion VARCHAR(20)
	AS
	BEGIN TRANSACTION

	IF @Accion = 'I'
		BEGIN
			INSERT INTO GRUPO(GRU_Titulo,GRU_Observaciones,GRU_Estado,DEP_Departamento,USR_Usuario_Creacion)
			VALUES(@GRU_Titulo,@GRU_Observaciones,@GRU_Estado,@DEP_Departamento,@USR_Usuario_Creacion);
			IF @@ERROR <> 0
				BEGIN
					ROLLBACK TRANSACTION
					RAISERROR ('Error.', 16, 1)
					RETURN
				END
		END
	ELSE
		IF @Accion = 'S'
			BEGIN
				SELECT GRU.GRU_Grupo,GRU.GRU_Titulo,GRU.GRU_Observaciones,GRU.GRU_Estado,GRU.DEP_Departamento,DEP.DEP_TITULO,
				CONVERT(VARCHAR(10), GRU.USR_Fecha_Creacion, 103) AS USR_Fecha_Creacion
				FROM GRUPO GRU 
				inner join DEPARTAMENTOS DEP ON (GRU.DEP_Departamento = DEP.DEP_Departamento)
				WHERE GRU.GRU_Estado IN ( 'A' , 'I' )
			END
	IF @@ERROR <> 0
	BEGIN
		ROLLBACK TRANSACTION
		RAISERROR ('Error.', 16, 1)
		RETURN
	END
	commit TRANSACTION
GO
