GO
	ALTER procedure [dbo].[pa_Grupos](
	@Accion varchar(6),
	@GRU_Titulo varchar(50),
	@GRU_Observaciones varchar(100),
	@GRU_Estado varchar(1),
	@Gru_Grupo int,
	@DEP_Departamento varchar(100) ,
	@USR_Usuario_Creacion varchar(20)
	)
	as
	DECLARE @DEP_DepartamentoID INT;
	begin
		BEGIN TRANSACTION;  
			BEGIN TRY
				if(@Accion = 'SELECT')
					begin
						select GRU_Grupo,GRU_Titulo,GRU_Observaciones,case when GRU_Estado = 'A' then 'Activo' else 'Inactivo'
						end,DEP_Titulo,CONVERT(VARCHAR, gru.USR_Fecha_Creacion, 105)
						from GRUPO gru 
						inner join DEPARTAMENTOS dep on gru.DEP_DEPARTAMENTO = dep.DEP_Departamento
						where gru.GRU_Estado in ('I','A');
					end
				else
				if(@Accion = 'INSERT')
					begin
						select @DEP_DepartamentoID=DEPARTAMENTOS.DEP_Departamento  from dbo.DEPARTAMENTOS where DEPARTAMENTOS.DEP_Titulo = @DEP_Departamento;
						insert into GRUPO(GRU_Titulo,GRU_Observaciones,GRU_Estado,DEP_Departamento,USR_Usuario_Creacion)
						values(@GRU_Titulo,@GRU_Observaciones,@GRU_Estado,@DEP_DepartamentoID,@USR_Usuario_Creacion)

						insert into ROLESHASMENU(Grupo_id,Menu_id,estado,descripcion) 
						select gru.GRU_Grupo,opc.id, 'I','[Menu : '+opc.Menu_NombrePadre+'] [Submenu : '+opc.Menu_nombreHija+'] [Grupo : '+gru.GRU_Titulo+']'
						from Menu_Opciones opc , GRUPO  gru 
						where '[Menu : '+opc.Menu_NombrePadre+'] [Submenu : '+opc.Menu_nombreHija+'] [Grupo : '+gru.GRU_Titulo+']' not in (select descripcion from ROLESHASMENU)

					end
				if(@Accion = 'F')
					begin
						SELECT	GRU_Grupo,GRU_Titulo,GRU_Observaciones,GRU_Estado,dep.DEP_Titulo
						FROM GRUPO gru
						inner join DEPARTAMENTOS dep on ( gru.DEP_Departamento = dep.DEP_Departamento)
						WHERE gru.GRU_Grupo = @Gru_Grupo;
					end
				if(@Accion = 'UPDATE')
					begin
						select @DEP_DepartamentoID=DEPARTAMENTOS.DEP_Departamento  from dbo.DEPARTAMENTOS where DEPARTAMENTOS.DEP_Titulo = @DEP_Departamento;
						update GRUPO 
						set GRU_Titulo = @GRU_Titulo,
						GRU_Observaciones = @GRU_Observaciones,
						GRU_Estado = @GRU_Estado,
						DEP_Departamento = @DEP_DepartamentoID,
						USR_Usuario_Modificacion = @USR_Usuario_Creacion,
						USR_Fecha_Modificacion = GETDATE()
						where GRU_Grupo = @Gru_Grupo;
					end	
				if(@Accion = 'DELETE')
					begin
						update GRUPO 
						set GRU_Estado = @GRU_Estado,USR_Usuario_Modificacion = @USR_Usuario_Creacion,USR_Fecha_Modificacion = GETDATE()
						where GRU_Grupo = @Gru_Grupo;
					end	
				if(@Accion = 'E')
					begin
						select @DEP_DepartamentoID=DEPARTAMENTOS.DEP_Departamento  from dbo.DEPARTAMENTOS where DEPARTAMENTOS.DEP_Titulo = @DEP_Departamento;
						update GRUPO 
						set 
						GRU_Estado = @GRU_Estado,
						USR_Usuario_Modificacion = @USR_Usuario_Creacion,
						USR_Fecha_Modificacion = GETDATE()
						where GRU_Grupo = @Gru_Grupo;
					end	
				if(@Accion = 'C')
					begin
						select GRU_Titulo
						from GRUPO  where GRU_Estado in('A')
					end	
			END TRY

			BEGIN CATCH
				IF @@TRANCOUNT > 0  
					BEGIN
						ROLLBACK TRANSACTION;  
					END

			  insert into ERRORESLOG(Error_Number,Error_State,ERROR_SEVERITY,ERROR_PROCEDURE,ERROR_LINE,ERROR_MESSAGE,USR_Nombre)
			  SELECT ERROR_NUMBER() AS ErrorNumber,ERROR_STATE() AS ErrorState,ERROR_SEVERITY() AS ErrorSeverity,ERROR_PROCEDURE() AS ErrorProcedure,ERROR_LINE() AS ErrorLine,ERROR_MESSAGE() AS ErrorMessage,@USR_Usuario_Creacion;
			  select top 1 id,Error_Number,Error_State,ERROR_SEVERITY,ERROR_PROCEDURE,ERROR_LINE,ERROR_MESSAGE from ERRORESLOG order by ID desc;
		   
		   END CATCH;

	IF @@TRANCOUNT > 0 
	BEGIN
		COMMIT TRANSACTION
	END
end
