alter procedure pa_Usuarios(
	@Accion varchar(1),
	@UsuarioNombre varchar(40),
	@UsuarioCorreo varchar(40),
	@UsuarioEstado varchar(1),
	@UsuarioPassword varchar(20),
	@UsuarioInclusion varchar(40),
	@UsuarioRol varchar(1),
	@GRU_Titulo varchar(50),
	@Usr_Usuario int
	)
	as
	DECLARE @GRU_GRUPO int;
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
			select @GRU_GRUPO=GRUPO.GRU_Grupo  from dbo.GRUPO where GRUPO.GRU_Titulo = @GRU_Titulo;

			insert into USUARIOS([GRU_Grupo],[USR_Nombre],[USR_Correo],[USR_Estado],[USR_Password],[USR_ROL],[USR_Fecha_Creacion],[USR_Usuario_Creacion])
			values(@GRU_GRUPO,@UsuarioNombre,@UsuarioCorreo,@UsuarioEstado,@UsuarioPassword,@UsuarioRol,getdate(),@UsuarioInclusion)
		end
	if(@Accion = 'F')
		begin
			select usr.USR_Usuario,usr.USR_Nombre,usr.USR_Password,usr.USR_Correo,grp.GRU_Titulo,usr.USR_ROL+' - '+CDE.CAT_Descripcion as ROL,usr.USR_Estado+' - '+est.CAT_Descripcion as Estado
			from USUARIOS usr
			inner join GRUPO grp on (usr.GRU_Grupo=grp.GRU_Grupo)
			INNER JOIN CATALOGO_DETALLE CDE ON ( usr.USR_ROL = CDE.CAT_Contraccion AND CDE.CAT_Tabla='ROLES')
			INNER JOIN CATALOGO_DETALLE est ON (usr.USR_Estado = est.CAT_Contraccion AND est.CAT_Tabla='Estados')
			where usr.USR_Usuario = @Usr_Usuario
		end
	if(@Accion = 'U')
		begin
			select @GRU_GRUPO=GRUPO.GRU_Grupo  from dbo.GRUPO where GRUPO.GRU_Titulo = @GRU_Titulo;

			update USUARIOS
			set GRU_Grupo=@GRU_GRUPO,USR_Nombre = @UsuarioNombre,USR_Usuario_Modificacion=@UsuarioInclusion,
				USR_Correo=@UsuarioCorreo,USR_ROL=@UsuarioRol,USR_Estado=@UsuarioEstado,USR_Fecha_Modificacion=GETDATE(),
				USR_Password=@UsuarioPassword
			where USR_Usuario = @Usr_Usuario
		end	
	if(@Accion = 'D')
		begin
			update USUARIOS
			set USR_Estado=@UsuarioEstado
			where USR_Usuario = @Usr_Usuario
		end	
	if(@Accion = 'C')
		begin
			select USR_Nombre from USUARIOS where USR_Estado = 'A'
	end
end