alter procedure pa_Usuarios(
	@Accion varchar(1)
	)
	as
	begin
	if(@Accion = 'C')
		begin
			select USR_Nombre from USUARIOS where USR_Estado = 'A'
	end
end
