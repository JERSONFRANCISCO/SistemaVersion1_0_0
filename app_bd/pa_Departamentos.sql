ALTER procedure pa_Departametos(
	@Accion varchar(1),
	@DEP_Titulo varchar(100),
	@DEP_Observaciones varchar(100),
	@DEP_Departameto int ,
	@DEP_Estado varchar(1),
	@USR_Usuario_Creacion varchar(20)
	)
	as
	begin
	if(@Accion = 'S')
		begin
			select DEP_Departamento,DEP_Titulo,DEP_Observaciones,
			case when DEP_Estado = 'A' then 'Activo' else 'Inactivo'
			end,CONVERT(VARCHAR, dep.USR_Fecha_Creacion, 111) as USR_Fecha_Creacion
			 from DEPARTAMENTOS dep where DEP_Estado in('A','I')
		end
		else
	if(@Accion = 'I')
		begin
			insert into DEPARTAMENTOS(DEP_Titulo,DEP_Observaciones,DEP_Estado,USR_Usuario_Creacion)
			values(@DEP_Titulo,@DEP_Observaciones,@DEP_Estado,@USR_Usuario_Creacion)
		end
	if(@Accion = 'F')
		begin
			SELECT DEP_Departamento,DEP_Titulo,DEP_Observaciones,DEP_Estado 
			FROM DEPARTAMENTOS WHERE DEPARTAMENTOS.DEP_Departamento = @DEP_Departameto;
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
	if(@Accion = 'C')
		begin
			select DEP_Titulo
			from DEPARTAMENTOS dep where DEP_Estado in('A')
		end
end