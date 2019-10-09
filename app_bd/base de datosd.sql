
/*
	Datos de la tabla de catalogo el cual mantiene un estandar los tipos de datos a usar
*/
insert into catalogo(cat_tabla,cat_estado) values('Prioridades','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','U','URGENTE','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','N','NORMAL','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Prioridades','S','SIN URGENCIA','A')


insert into CATALOGO (cat_tabla,cat_estado) values ('Estados','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(2,'Estados','A','ACTIVO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(2,'Estados','I','INACTIVO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(2,'Estados','B','BORRADO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(2,'Estados','C','CERRADO','A')

insert into CATALOGO (cat_tabla,cat_estado) values ('ROLES','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(3,'ROLES','A','ADMINISTRADOR','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(3,'ROLES','J','JEFATURA','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(3,'ROLES','U','USUARIO','A')





insert into Menu_Opciones(Menu_NombrePadre,Menu_NombreHija,Menu_Estado,Menu_URL)
values('Mantenimiento','Departamentos','A','departamento.php'),
('Mantenimiento','Grupos','A','grupo.php'),
('Mantenimiento','Usuarios','A','usuario.php'),
('Mantenimiento','Tareas','A','tareas.php'),
('Mantenimiento','Work Flow','A','work_flow.php'),
('Tickets','Crear ticket','A','crear_ticket.php'),
('Tickets','Mis tickets','A',''),
('Tickets','Tickets abiertos','A','tickets_abiertos.php?status=ABIERTO'),
('Tickets','Tickets cerrados','A','tickets_abiertos.php?status=CERRADO'),
('Ayuda','Preguntas Frecuentes','A','soporte.php'),
('Ayuda','Soporte Técnico','A','soporte.php'),
('Usuario','Cerrar Sesion','A','login.php?login=false')


--('Usuario','Cerrar Sesion','A','login.php?login=false') cerrar session directo


-- llenar la tabla de permisos para que le salgan todas las opciones a los usuarios correr despues de 
-- la inserción en menu opciones



insert into ROLESHASMENU(Grupo_id,Menu_id,estado,descripcion) 
select gru.GRU_Grupo,opc.id, 'I','[Menu : '+opc.Menu_NombrePadre+'] [Submenu : '+opc.Menu_nombreHija+'] [Grupo : '+gru.GRU_Titulo+']'
from Menu_Opciones opc , GRUPO  gru 
where '[Menu : '+opc.Menu_NombrePadre+'] [Submenu : '+opc.Menu_nombreHija+'] [Grupo : '+gru.GRU_Titulo+']' not in (select descripcion from ROLESHASMENU)


