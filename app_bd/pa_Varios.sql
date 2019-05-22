ALTER procedure pa_Estandar(
	@Accion varchar(2),
	@DEP_TABLA varchar(20)
	)
	as
	begin
	if(@Accion = 'CA')
		begin
			select CAT_DESCRIPCION from CATALOGO_DETALLE det 
			inner join CATALOGO cat on (det.CAT_Tabla = cat.CAT_Tabla and det.CAT_Catalogo = cat.CAT_Catalogo)
			where cat.CAT_Tabla = @DEP_TABLA and cat.CAT_Estado = 'A' and det.CAT_Estado = 'A'
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
			SELECT CONVERT(VARCHAR(30),TAL_Numero) AS TalNumero,TAL_Descripcion AS OT 
			FROM SabioTerra..ALQ_TALLER
			WHERE TAL_Reparado <> 'S'
	end

end