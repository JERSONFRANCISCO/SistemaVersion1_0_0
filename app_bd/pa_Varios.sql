ALTER procedure pa_Estandar(
	@Accion varchar(2),
	@DEP_TABLA varchar(20),
	@DEP_TABLA2 varchar(20)
	)
	as
	begin
	if(@Accion = 'CA')
		begin
			select  CAT_Contraccion + ' - ' + CAT_DESCRIPCION from CATALOGO_DETALLE det 
			inner join CATALOGO cat on (det.CAT_Tabla = cat.CAT_Tabla and det.CAT_Catalogo = cat.CAT_Catalogo)
			where cat.CAT_Tabla = @DEP_TABLA and cat.CAT_Estado = 'A' and det.CAT_Estado = 'A'
	end
	if(@Accion = 'WF')
		begin
			select WRK_Titulo,WRK_WORK_FLOW from WORK_FLOW where WRK_Estado='A'
	end
	if(@Accion = 'CL')
		begin
			SELECT CLI_NOMBRE,CLI_CLIENTE
			FROM SabioTerra..CLI_CLIENTES 
			WHERE CLI_CLIENTES.CLI_Activo = 1 ORDER BY CLI_Nombre ASC
			
	end
	if(@Accion = 'VD')
		begin
			SELECT VEN_Nombre,VEN_Vendedor
			FROM SabioTerra..VEN_VENDEDORES
			WHERE VEN_VENDEDORES.VEN_Activo = 1
			
	end
	if(@Accion = 'OT')
		begin
			SELECT TAL_Descripcion AS OT, TAL_Numero AS TalNumero
			FROM SabioTerra..ALQ_TALLER
			WHERE TAL_Reparado <> 'S' and CLI_Cliente = @DEP_TABLA and PRO_Proyecto = @DEP_TABLA2
	end
	if(@Accion = 'PC')
		begin
			SELECT PRO_PROYECTOS.PRO_Nombre AS OT, PRO_PROYECTOS.PRO_Proyecto AS TalNumero
			FROM SabioTerra..PRO_PROYECTOS
			WHERE PRO_PROYECTOS.PRO_Activo = 1 and CLI_Cliente = @DEP_TABLA 
	end
end



