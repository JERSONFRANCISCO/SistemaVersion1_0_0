create procedure pa_Estandar(
	@Accion varchar(1),
	@DEP_TABLA varchar(20)
	)
	as
	begin
	if(@Accion = 'C')
		begin
			select CAT_DESCRIPCION from CATALOGO_DETALLE det 
			inner join CATALOGO cat on (det.CAT_Tabla = cat.CAT_Tabla and det.CAT_Catalogo = cat.CAT_Catalogo)
			where cat.CAT_Tabla = @DEP_TABLA and cat.CAT_Estado = 'A' and det.CAT_Estado = 'A'
	end
end