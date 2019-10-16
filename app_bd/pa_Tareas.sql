alter procedure pa_Tareas(
	@Accion varchar(6),
	@DEP_DEPARTAMENTO varchar(100),
	@USR_Usuario varchar(100),
	@WRK_Titulo varchar(100),
	@WRK_Observaciones text,
	@WRK_Minutos int,
	@WRK_Horas int,
	@WRK_Estado varchar(1),
	@USR_Usuario_Creacion varchar(100),
	@WRK_DETALLE int
	)
	as
	DECLARE @DEP_DepartamentoID INT;
	DECLARE @USUARIO int;
	begin
		BEGIN TRANSACTION;  
			BEGIN TRY
			if(@Accion = 'SELECT')
				begin
					select  wt.WRK_DETALLE,wt.WRK_Titulo,wt.WRK_Observaciones,wt.WRK_Horas,wt.WRK_Minutos,ur.USR_Nombre,dp.DEP_Titulo,case when wt.WRK_Estado = 'A' then 'Activo' else 'Inactivo' end as Estado
					from WORK_FLOW_TAREAS wt
					left join DEPARTAMENTOS dp on (wt.DEP_DEPARTAMENTO = dp.DEP_Departamento)
					left join USUARIOS ur on ( wt.USR_Usuario = ur.USR_Usuario)
					where wt.WRK_Estado in ('A','I')
				end
			if(@Accion = 'INSERT')
				begin
					select @DEP_DepartamentoID=DEP_Departamento from DEPARTAMENTOS where DEP_Titulo = @DEP_DEPARTAMENTO;
					select @USUARIO=USR_Usuario from USUARIOS where USR_Nombre = @USR_Usuario;
			
					insert into WORK_FLOW_TAREAS(DEP_DEPARTAMENTO,USR_Usuario,WRK_Titulo,WRK_Observaciones,WRK_Minutos,WRK_Horas,WRK_Estado,USR_Fecha_Creacion,USR_Usuario_Creacion)
					values (@DEP_DepartamentoID,@USUARIO,@WRK_Titulo,@WRK_Observaciones,@WRK_Minutos,@WRK_Horas,@WRK_Estado,GETDATE(),@USR_Usuario_Creacion)
		
				end
			if(@Accion = 'SEARCH')
				begin
					select  wt.WRK_DETALLE,wt.WRK_Titulo,wt.WRK_Observaciones,wt.WRK_Horas,wt.WRK_Minutos,ur.USR_Nombre,dp.DEP_Titulo,wt.WRK_Estado+' - '+est.CAT_Descripcion as Estado
					from WORK_FLOW_TAREAS wt
					left join DEPARTAMENTOS dp on (wt.DEP_DEPARTAMENTO = dp.DEP_Departamento)
					left join USUARIOS ur on ( wt.USR_Usuario = ur.USR_Usuario)
					INNER JOIN CATALOGO_DETALLE est ON (wt.WRK_Estado = est.CAT_Contraccion AND est.CAT_Tabla='Estados')
					where wt.WRK_Estado in ('A','I') AND wt.WRK_DETALLE =  @WRK_DETALLE
				end
			if(@Accion = 'UPDATE')
				begin
					select @DEP_DepartamentoID=DEP_Departamento from DEPARTAMENTOS where DEP_Titulo = @DEP_DEPARTAMENTO;
					select @USUARIO=USR_Usuario from USUARIOS where USR_Nombre = @USR_Usuario;
					update WORK_FLOW_TAREAS 
					set DEP_DEPARTAMENTO = @DEP_DepartamentoID, USR_Usuario = @USUARIO, WRK_Titulo=@WRK_Titulo,WRK_Observaciones=@WRK_Observaciones,WRK_Estado=@WRK_Estado,
					WRK_Minutos=@WRK_Minutos,WRK_Horas=@WRK_Horas,usr_fecha_modificacion = GETDATE(),usr_usuario_modificacion=@USR_Usuario_Creacion
					where WRK_DETALLE = @WRK_DETALLE
				end	
			if(@Accion = 'DELETE')
				begin
					update WORK_FLOW_TAREAS 
					set WRK_Estado=@WRK_Estado,usr_fecha_modificacion = GETDATE(),usr_usuario_modificacion=@USR_Usuario_Creacion
					where WRK_DETALLE = @WRK_DETALLE
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