alter procedure /*nombre*/ (
	/*
		Entrada
	*/
	)
	as
	/*
		Declaraciones
	*/
	begin
		BEGIN TRANSACTION;  
			BEGIN TRY
				/*
					A ejecutar
				*/
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