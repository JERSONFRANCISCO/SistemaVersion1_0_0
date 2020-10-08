alter procedure pa_LoginUsuarios(
	@Usuario varchar(20),
	@Password varchar(20)
	)
	as
	begin
		select USR_Usuario, 
		USR_Nombre, 
		isnull(USR_UrlImg,'') as USR_UrlImg ,
		USR_Correo as USR_Correo , 
		USR_ROL 
		from USUARIOS 
		where USR_Nombre = @Usuario  and USR_Password = @Password and (USR_ESTADO = 'A' OR USR_ESTADO = 'O');
end

