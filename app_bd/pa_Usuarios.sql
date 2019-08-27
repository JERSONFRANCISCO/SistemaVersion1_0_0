alter procedure pa_Usuarios(
	@Accion varchar(1),
	@UsuarioNombre varchar(40),
	@UsuarioCorreo varchar(20),
	@UsuarioEstado varchar(1),
	@UsuarioPassword varchar(20),
	@UsuarioInclusion varchar(40),
	@UsuarioRol varchar(1)
	)
	as
	begin
	if(@Accion = 'S')
		begin
			SELECT USR_Usuario,USR_Nombre,USR_Correo,GRU.GRU_Titulo,DEP.DEP_Titulo,
			case when USR.USR_Estado = 'A' then 'Activo' else 'Inactivo' END AS ESTADO,
			CDE.CAT_Descripcion  FROM USUARIOS USR 
			INNER JOIN GRUPO GRU ON ( USR.GRU_Grupo = GRU.GRU_Grupo )
			INNER JOIN DEPARTAMENTOS DEP ON ( GRU.DEP_Departamento = DEP.DEP_Departamento)
			INNER JOIN CATALOGO_DETALLE CDE ON ( USR.USR_ROL = CDE.CAT_Contraccion AND CDE.CAT_Tabla='ROLES')
			where USR.USR_Estado in('A','I')
	end
	if(@Accion = 'I')
		begin
			insert into USUARIOS([GRU_Grupo],[USR_Nombre],[USR_Correo],[USR_Estado],[USR_Password],[USR_ROL],[USR_Fecha_Creacion],[USR_Usuario_Creacion])
			values(1,@UsuarioNombre,@UsuarioCorreo,@UsuarioEstado,@UsuarioPassword,@UsuarioRol,getdate(),@UsuarioInclusion)
		end
	if(@Accion = 'F')
		begin
			select '';
		end
	if(@Accion = 'U')
		begin
			select '';
		end	
	if(@Accion = 'C')
		begin
			select USR_Nombre from USUARIOS where USR_Estado = 'A'
	end
end