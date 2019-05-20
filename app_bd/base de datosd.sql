

create procedure pa_HiloTicet(
	@DEP_Titulo text
	)
	as
	begin
	insert into TICKET_detalle(TIC_TICKET,USR_Usuario,TIC_TItulo,tic_observaciones,TIC_Estado)
		values(2,'Jerson','ESTADO',@DEP_Titulo,'A');
end







select * from CATALOGO
select * from CATALOGO_DETALLE 

insert into catalogo(cat_tabla,cat_estado) values('Prioridades','A')

insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','U','URGENTE','A')

insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','N','NORMAL','A')

insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','S','SIN URGENCIA','A')
