alter procedure pa_MenuUsuarios(
	@usr varchar(100)
	)
	as
	begin
		select  menu_nombrepadre,case when menu_nombrehija = 'Mis tickets' then menu_nombrehija+' (*)' else Menu_NombreHija end as menu_nombrehija,menu_url 
		from USUARIOS usr
		inner join GRUPO gru on (usr.GRU_Grupo = gru.GRU_Grupo )
		inner join ROLESHASMENU rm on( gru.GRU_Grupo = rm.Grupo_id)
		inner join Menu_Opciones mo on (rm.Menu_id = mo.id)
		where usr.USR_Nombre = @usr and rm.estado = 'A'
end