alter procedure pa_WorkFlow (
	@Accion varchar(6),
	@WRK_WORK_FLOW INT,
	@DEP_titulo varchar(100),
	@WRK_Titulo varchar(100),
	@WRK_Observaciones text,
	@WRK_Estado varchar(1) ,
	@USR_Usuario_Creacion varchar(100),
	@WRK_DETALLE int
	)
	as
	DECLARE @DEP_DepartamentoID INT;

	begin
		BEGIN TRANSACTION;  
			BEGIN TRY
				if(@Accion = 'SELECT')
					begin
						select WORK_FLOW.WRK_WORK_FLOW,WORK_FLOW.WRK_Titulo,WORK_FLOW.WRK_Observaciones,dp.DEP_Titulo,case when WORK_FLOW.WRK_Estado = 'A' then 'Activo' else 'Inactivo' end as Estado 
						from WORK_FLOW
						left join DEPARTAMENTOS dp on (WORK_FLOW.DEP_DEPARTAMENTO = dp.DEP_Departamento)
						where WORK_FLOW.WRK_Estado in ('A','I')
					end
				if(@Accion = 'TAREAS')
					begin
						select wt.WRK_DETALLE,wt.WRK_Titulo,wt.WRK_Observaciones,DEP.DEP_Titulo,USR.USR_Nombre,wt.WRK_Horas,wt.WRK_Minutos 
						from WORK_FLOW wf 
						inner join WORK_FLOW_HAS_WORK_FLOW_TAREAS whf on(wf.WRK_WORK_FLOW = whf.WRK_WORK_FLOW)
						inner join  WORK_FLOW_TAREAS wt on (wt.WRK_DETALLE = whf.WRK_DETALLE)
						left join USUARIOS USR ON (wt.USR_Usuario = USR.USR_Usuario)
						left join  DEPARTAMENTOS DEP ON (DEP.DEP_Departamento = wt.DEP_DEPARTAMENTO)
						WHERE wf.WRK_WORK_FLOW = @WRK_WORK_FLOW
					end
				if(@Accion = 'WRKDIS')-- TAREAS QUE NO ESTÁN LIGADAS A NINGUN FLUJO DE TRABAJO
					begin
						select wt.WRK_DETALLE,wt.WRK_Titulo,wt.WRK_Observaciones,DEP.DEP_Titulo,USR.USR_Nombre,wt.WRK_Horas,wt.WRK_Minutos  
						from WORK_FLOW_TAREAS wt
						left join USUARIOS USR ON (wt.USR_Usuario = USR.USR_Usuario)
						left join  DEPARTAMENTOS DEP ON (DEP.DEP_Departamento = wt.DEP_DEPARTAMENTO)
						where WRK_DETALLE not in (
						select WRK_DETALLE from WORK_FLOW_HAS_WORK_FLOW_TAREAS where WRK_WORK_FLOW = @WRK_WORK_FLOW
						)
					end
				if(@Accion = 'WRKNEW')-- TAREAS QUE NO ESTÁN LIGADAS A NINGUN FLUJO DE TRABAJO
					begin
					select wt.WRK_DETALLE,wt.WRK_Titulo,wt.WRK_Observaciones,DEP.DEP_Titulo,USR.USR_Nombre,wt.WRK_Horas,wt.WRK_Minutos  
					from WORK_FLOW_TAREAS wt
					left join USUARIOS USR ON (wt.USR_Usuario = USR.USR_Usuario)
					left join  DEPARTAMENTOS DEP ON (DEP.DEP_Departamento = wt.DEP_DEPARTAMENTO)
					end
				if(@Accion = 'INSERT')-- TAREAS QUE NO ESTÁN LIGADAS A NINGUN FLUJO DE TRABAJO
					begin
						select @DEP_DepartamentoID=DEPARTAMENTOS.DEP_Departamento  from dbo.DEPARTAMENTOS where DEPARTAMENTOS.DEP_Titulo = @DEP_titulo; 

						insert into WORK_FLOW(WRK_Titulo,WRK_Observaciones,WRK_Estado,DEP_Departamento,USR_Usuario_Creacion)
						values(@WRK_Titulo,@WRK_Observaciones,@WRK_Estado,@DEP_DepartamentoID,@USR_Usuario_Creacion)

						select max(WRK_WORK_FLOW) from WORK_FLOW;
					end
				if(@Accion = 'DELETE')-- TAREAS QUE NO ESTÁN LIGADAS A NINGUN FLUJO DE TRABAJO
					begin
					  Delete from WORK_FLOW_HAS_WORK_FLOW_TAREAS where WRK_WORK_FLOW = @WRK_WORK_FLOW
					end
				if(@Accion = 'TASK')-- TAREAS QUE NO ESTÁN LIGADAS A NINGUN FLUJO DE TRABAJO
					begin
						insert into WORK_FLOW_HAS_WORK_FLOW_TAREAS(WRK_WORK_FLOW,WRK_DETALLE) values(@WRK_WORK_FLOW,@WRK_DETALLE)
					end
				if(@Accion = 'UPDATE')-- TAREAS QUE NO ESTÁN LIGADAS A NINGUN FLUJO DE TRABAJO
					begin
						select @DEP_DepartamentoID=DEPARTAMENTOS.DEP_Departamento  from dbo.DEPARTAMENTOS where DEPARTAMENTOS.DEP_Titulo = @DEP_titulo; 

						update WORK_FLOW 
						set WRK_Titulo = @WRK_Titulo, WRK_Observaciones=@WRK_Observaciones, WRK_Estado=@WRK_Estado,DEP_Departamento=@DEP_DepartamentoID,USR_Fecha_Modificacion=GETDATE(),USR_Usuario_Modificacion=@USR_Usuario_Creacion
						where WRK_WORK_FLOW = @WRK_WORK_FLOW 
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