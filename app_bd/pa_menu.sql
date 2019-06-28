alter procedure pa_MenuUsuarios(
	@ROL varchar(1)
	)
	as
	begin
		select menu_nombrepadre,case when menu_nombrehija = 'Mis tickets' then menu_nombrehija+' (*)' else Menu_NombreHija end as menu_nombrehija,menu_url
		from Menu_Opciones sub 
		inner join ROLESHASMENU rm on ( sub.id = rm.Menu_id )
		inner join CATALOGO_DETALLE c on ( rm.ROL_id = c.CAT_Detalle)
		where c.CAT_Estado = 'A' and rm.estado = 'A'and sub.Menu_Estado = 'A'
		and CAT_Contraccion = @ROL
end