alter procedure pa_Departametos(
	@Accion varchar(6),
	@DEP_Titulo varchar(100),
	@DEP_Observaciones varchar(100),
	@DEP_Departameto int ,
	@DEP_Estado varchar(1),
	@USR_Usuario_Creacion varchar(20)
	)
	as
	begin
		BEGIN TRANSACTION;  
			BEGIN TRY
				if(@Accion = 'SELECT')
					begin
						select DEP_Departamento,DEP_Titulo,DEP_Observaciones,
						case when DEP_Estado = 'A' then 'Activo' else 'Inactivo'
						end,CONVERT(VARCHAR, dep.USR_Fecha_Creacion, 105) as USR_Fecha_Creacion
						from DEPARTAMENTOS dep where DEP_Estado in('A','I')
					end
				if(@Accion = 'INSERT')
					begin
						insert into DEPARTAMENTOS(DEP_Titulo,DEP_Observaciones,DEP_Estado,USR_Usuario_Creacion)
						values(@DEP_Titulo,@DEP_Observaciones,@DEP_Estado,@USR_Usuario_Creacion)
					end
				if(@Accion = 'SEARCH')
					begin
						SELECT DEP_Departamento,DEP_Titulo,DEP_Observaciones,DEP_Estado 
						FROM DEPARTAMENTOS WHERE DEPARTAMENTOS.DEP_Departamento = @DEP_Departameto;
					end
				if(@Accion = 'UPDATE')
					begin
						update DEPARTAMENTOS
						set DEP_Estado = @DEP_Estado,
						DEP_Titulo = @DEP_Titulo,
						DEP_Observaciones = @DEP_Observaciones,
						USR_Usuario_Modificacion = @USR_Usuario_Creacion,
						USR_Fecha_Modificacion = GETDATE()
						where DEP_Departamento = @DEP_Departameto;
					end	
				if(@Accion = 'DELETE')
					begin
						update DEPARTAMENTOS
						set DEP_Estado = @DEP_Estado,
						USR_Usuario_Modificacion = @USR_Usuario_Creacion,
						USR_Fecha_Modificacion = GETDATE()
						where DEP_Departamento = @DEP_Departameto;
					end	
				if(@Accion = 'C')
					begin
						select DEP_Titulo
						from DEPARTAMENTOS dep where DEP_Estado in('A')
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