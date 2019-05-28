ALTER procedure pa_ObtenerTickes(
	@Accion varchar(2),
	@Estado varchar(1)
)as
begin 
	if(@Accion = 'TA')
		begin
			Select TIC.TIC_Ticket,CONVERT(VARCHAR, TIC.USR_Fecha_Creacion, 111) as FechaCreacion ,TIC.TIC_Titulo,DEP.DEP_Titulo,
			CASE WHEN USR.USR_Nombre IS NULL THEN ''  ELSE USR.USR_Nombre END AS USUARIO,
			case when TIC.TIC_Estado = 'A' then 'Abierto' else 'Cerrado' end AS Estado,TIC.TIC_Porcentaje_Completado,CONVERT(VARCHAR, TIC.TIC_Fecha_Vencimiento, 111) as FechaVencimiento 
			from TICKET TIC
			LEFT JOIN USUARIOS USR ON (TIC.USR_Usuario = USR.USR_Usuario) 
			LEFT JOIN DEPARTAMENTOS DEP ON (TIC.DEP_DEPARTAMENTO = DEP.DEP_Departamento) 
			where TIC_Estado = @Estado
			order by TIC_Ticket desc
	end
end