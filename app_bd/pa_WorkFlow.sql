create procedure pa_WorkFlow(
	@Accion varchar(1)
	)
	as
	begin
	if(@Accion = 'S')
		begin
			select WORK_FLOW.WRK_WORK_FLOW,WORK_FLOW.WRK_Titulo,DEP_Observaciones,dp.DEP_Titulo,case when WORK_FLOW.WRK_Estado = 'A' then 'Activo' else 'Inactivo' end as Estado 
			from WORK_FLOW
			left join DEPARTAMENTOS dp on (WORK_FLOW.DEP_DEPARTAMENTO = dp.DEP_Departamento)
			where WORK_FLOW.WRK_Estado in ('A','I')
		end
	--if(@Accion = 'I')
	--	begin
	--		insert into DEPARTAMENTOS(DEP_Titulo,DEP_Observaciones,DEP_Estado,USR_Usuario_Creacion)
	--		values(@DEP_Titulo,@DEP_Observaciones,@DEP_Estado,@USR_Usuario_Creacion)
	--	end
	--if(@Accion = 'F')
	--	begin
		--	SELECT DEP_Departamento,DEP_Titulo,DEP_Observaciones,DEP_Estado 
	--		FROM DEPARTAMENTOS WHERE DEPARTAMENTOS.DEP_Departamento = @DEP_Departameto;
	--	end
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