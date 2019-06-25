
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
values(1,'Estados','A','ACTIVO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Estados','I','INACTIVO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Estados','B','BORRADO','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(1,'Estados','C','CERRADO','A')

insert into CATALOGO (cat_tabla,cat_estado) values ('ROLES','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(3,'ROLES','A','ADMINISTRADOR','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(3,'ROLES','J','JEFATURA','A')
insert into CATALOGO_DETALLE(CAT_Catalogo,CAT_Tabla,CAT_Contraccion,Cat_descripcion,cat_estado) 
values(3,'ROLES','U','USUARIO','A')






insert into OpcionMenu(nombre,estado,url_cod) values('Mantenimiento','A','')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(1,'Departamentos','A','departamento.php')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(1,'Grupos','A','grupo.php')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(1,'Usuarios','A','usuario.php')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(1,'Tareas','A','usuario.php')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(1,'Work Flow','A','usuario.php')
go
insert into OpcionMenu(nombre,estado,url_cod) values('Tickets','A','')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(2,'Crear ticket','A','crear_ticket.php')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(2,'Mis tickets','A','')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(2,'Tickets abiertos','A','tickets_abiertos.php?status=ABIERTO')
go
INSERT INTO OpcionSubMenu(idMenu,nombre,estado,url_cod) VALUES(2,'Tickets cerrados','A','tickets_abiertos.php?status=CERRADO')
go






insert into ROLESHASMENU(idROL,idMenu) values(10,6)
insert into ROLESHASMENU(idROL,idMenu) values(10,7)
insert into ROLESHASMENU(idROL,idMenu) values(10,8)
insert into ROLESHASMENU(idROL,idMenu) values(10,9)
-
insert into ROLESHASMENU(idROL,idMenu) values(10,4)
insert into ROLESHASMENU(idROL,idMenu) values(10,5)



insert into ROLESHASMENU(idROL,idMenu) values(9,1)
insert into ROLESHASMENU(idROL,idMenu) values(9,2)
insert into ROLESHASMENU(idROL,idMenu) values(9,3)
insert into ROLESHASMENU(idROL,idMenu) values(9,4)
insert into ROLESHASMENU(idROL,idMenu) values(9,5)
insert into ROLESHASMENU(idROL,idMenu) values(9,6)
insert into ROLESHASMENU(idROL,idMenu) values(9,7)
insert into ROLESHASMENU(idROL,idMenu) values(9,8)
insert into ROLESHASMENU(idROL,idMenu) values(9,9)

insert into ROLESHASMENU(idROL,idMenu) values(8,1)
insert into ROLESHASMENU(idROL,idMenu) values(8,2)
insert into ROLESHASMENU(idROL,idMenu) values(8,3)
insert into ROLESHASMENU(idROL,idMenu) values(8,4)
insert into ROLESHASMENU(idROL,idMenu) values(8,5)
insert into ROLESHASMENU(idROL,idMenu) values(8,6)
insert into ROLESHASMENU(idROL,idMenu) values(8,7)
insert into ROLESHASMENU(idROL,idMenu) values(8,8)
insert into ROLESHASMENU(idROL,idMenu) values(8,9)



select menu.nombre as NombrePadre,sub.nombre as NombreHijo,sub.url_cod,* 
from OpcionMenu menu 
inner join OpcionSubMenu sub on (menu.id = sub.idMenu)
inner join ROLESHASMENU r on (sub.id = r.idMenu)
inner join CATALOGO_DETALLE c on ( c.CAT_Detalle = r.idROL )
where CAT_Contraccion = 'J' and c.CAT_Tabla='ROLES' 
and sub.estado = 'A' 
and menu.estado = 'A' 