alter procedure pa_WorkFlow(
	@Accion varchar(6),
	@WRK_WORK_FLOW INT
	)
	as
	begin
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
	--if(@Accion = 'U')
		--begin
		--	update DEPARTAMENTOS
		--	set DEP_Estado = @DEP_Estado,
		--	DEP_Titulo = @DEP_Titulo,
		--	DEP_Observaciones = @DEP_Observaciones,
		--	USR_Usuario_Modificacion = @USR_Usuario_Creacion,
		--	USR_Fecha_Modificacion = GETDATE()
		--	where DEP_Departamento = @DEP_Departameto;
	--	end	
	--if(@Accion = 'C')
		--begin
		--	select DEP_Titulo
		--	from DEPARTAMENTOS dep where DEP_Estado in('A')
		--end
end