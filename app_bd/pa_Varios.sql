ALTER procedure pa_Estandar(
	@Accion varchar(2),
	@DEP_TABLA varchar(200),
	@DEP_TABLA2 varchar(200)
	)
	as
	declare @cli_cliente int, @pro_proyecto int;
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
			FROM Sabio..CLI_CLIENTES 
			WHERE CLI_CLIENTES.CLI_Activo = 1 ORDER BY CLI_Nombre ASC
			
	end
	if(@Accion = 'VD')
		begin
			SELECT VEN_Nombre,VEN_Vendedor
			FROM Sabio..VEN_VENDEDORES
			WHERE VEN_VENDEDORES.VEN_Activo = 1
			
	end
	if(@Accion = 'OT')
		begin
			select @cli_cliente = CLI_Cliente  from sabio..CLI_CLIENTES where CLI_Nombre = @DEP_TABLA 
			select @pro_proyecto = PRO_Proyecto  from sabio..PRO_PROYECTOS where PRO_Nombre = @DEP_TABLA2 

			SELECT TAL_Descripcion AS OT, TAL_Numero AS TalNumero
			FROM Sabio..ALQ_TALLER
			WHERE TAL_Reparado <> 'S' and CLI_Cliente = @cli_cliente and PRO_Proyecto = @pro_proyecto
	end
	if(@Accion = 'PC')
		begin
			
			select @cli_cliente = CLI_Cliente  from sabio..CLI_CLIENTES where CLI_Nombre = @DEP_TABLA 

			SELECT PRO_PROYECTOS.PRO_Nombre AS OT, PRO_PROYECTOS.PRO_Proyecto AS TalNumero
			FROM Sabio..PRO_PROYECTOS
			WHERE PRO_PROYECTOS.PRO_Activo = 1 and CLI_Cliente =  @cli_cliente 
	end
end