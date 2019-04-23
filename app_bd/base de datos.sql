/*	TABLA QUE ALMACENA LOS departamentos  */
CREATE TABLE dbo.DEPARTAMENTOS(
	id_DEPARTAMENTOS INT IDENTITY(1,1),
	DEP_DEPARTAMENTO varchar(10) Not NULL,
	DEP_Titulo varchar(20) not NULL,
	DEP_Observaciones varchar(40) not NULL,
	DEP_Estado varchar(1) not NULL,
	Fecha_Creacion datetime not null,
	USR_Usuario_Creacion varchar(20) NULL,
	Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL
	PRIMARY KEY (DEP_DEPARTAMENTO)
)
ALTER TABLE DBO.DEPARTAMENTOS ADD  DEFAULT (GETDATE()) FOR Fecha_Creacion
GO
INSERT INTO DEPARTAMENTOS(DEP_DEPARTAMENTO,DEP_Titulo,DEP_Observaciones,DEP_Estado,USR_Usuario_Creacion)VALUES
							('001','SEGUNDA','VA A SE EL DEPARTAMENTO NUMERO 2','A',SUSER_NAME())
-----------------------------------------------------------------------------------------------------------
/*  TABLA QUE ALMACENA LOS USUARIOS QUE VAN A UTILIZAR EL SISTEMA  */
CREATE TABLE dbo.USUARIOS(
	id_USUARIOS INT IDENTITY(1,1),
	USU_USUARIOS varchar(10) Not NULL,
	DEP_DEPARTAMENTO varchar(10) NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USU_Nombre varchar(20) not NULL,
	USU_Apellidos varchar(40) not NULL,
	USU_Correo varchar(20) not NULL,
	USU_Estado varchar(1) not NULL,
	USU_Password varchar(20) not NULL,
	Fecha_Creacion datetime null,
	USR_Usuario_Creacion varchar(20) NULL,
	Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL,
	PRIMARY KEY (USU_USUARIOS),
    FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO)
)
ALTER TABLE dbo.USUARIOS ADD  DEFAULT (GETDATE()) FOR Fecha_Creacion
GO

insert into USUARIOS(DEP_DEPARTAMENTO,USU_USUARIOS,USU_Nombre,USU_Apellidos,USU_Correo,USU_Estado,USU_Password)
values('001','051','JERSON','HIDALGO JIMENEZ','jersonfjl@live.com','A','JERSON123')

-----------------------------------------------------------------------------------------------------------
/*  Tabla para manejar un flujo de trabajo predefinido  */
CREATE TABLE dbo.WORK_FLOW(
	id_WORK_FLOW INT IDENTITY(1,1),
	WORK_FLOW_Numero float Not NULL,
	DEP_DEPARTAMENTO varchar(10) NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USU_USUARIOS varchar(10) NULL,		  -- REFERENCIA   dbo.USUARIOS
	WORK_FLOW_Titulo varchar(100) not null,
	WORK_FLOW_Observaciones text,
	WORK_FLOW_Estado varchar(1) not null, -- REALIZADO O NO
	Fecha_Creacion datetime not null,
	USR_Usuario_Creacion varchar(20) NULL,
	Fecha_Cierre datetime null,
	USR_Usuario_Cierre varchar(20) NULL,
	PRIMARY KEY (WORK_FLOW_Numero),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO),
	FOREIGN KEY (USU_USUARIOS) REFERENCES USUARIOS(USU_USUARIOS)
) 
/*  Tabla que almacena las tareas del workflow  */
CREATE TABLE dbo.WORK_FLOW_DETALLE(
	id_WORK_FLOW_DETALLE INT IDENTITY(1,1),
	WORK_FLOW_Numero float Not NULL,	  -- REFERENCIA  dbo.WORK_FLOW
	DEP_DEPARTAMENTO varchar(10) NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USU_USUARIOS varchar(10) NULL,		  -- REFERENCIA   dbo.USUARIOS
	WORK_FLOW_DETALLE_Titulo varchar(100) not null,
	WORK_FLOW_DETALLE_Observaciones text,
	WORK_FLOW_DETALLE_Estado varchar(1) not null,-- REALIZADO O NO
	Fecha_Creacion datetime not null,
	USR_Usuario_Creacion varchar(20) NULL,
	Fecha_Cierre datetime null,
	USR_Usuario_Cierre varchar(20) NULL,
	FOREIGN KEY (WORK_FLOW_Numero) REFERENCES WORK_FLOW(WORK_FLOW_Numero),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO),
	FOREIGN KEY (USU_USUARIOS) REFERENCES USUARIOS(USU_USUARIOS)
)
-----------------------------------------------------------------------------------------------------------
CREATE TABLE dbo.TICKET(
	id_Table_TICKET INT IDENTITY(1,1),
	CIA_Codigo varchar(3) not null,
	TICKET_Numero float Not NULL,
	
	Ven_Vendedor varchar(7) null,
	Cli_Cliente varchar(10) null,
	Pro_Proyecto varchar(4) null, -- Pro_Proyectos
	Tal_Numero float null, -- Alq_taller

	TICKET_Titulo varchar(100) not null,
	TICKET_Observaciones text,
	WORK_FLOW_Numero  float Not NULL, -- REFETENCIA dbo.WORK_FLOW
	DEP_DEPARTAMENTO varchar(10) NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	TICKET_Estado varchar(1) not null,
	Fecha_Creacion datetime not null,
	USR_Usuario_Creacion varchar(20) NULL,
	Fecha_Cierre datetime not null,
	USR_Usuario_Cierre varchar(20) NULL,
	Fecha_Reapertura datetime not null,
	USR_Usuario_Reapertura varchar(20) NULL,
	Fecha_Modificacion datetime not null,
	USR_Usuario_Modificacion varchar(20) NULL,
	Fecha_Vencimiento datetime not null,
	Prioridad varchar(1) not null,
	PRIMARY KEY (TICKET_Numero),
	FOREIGN KEY (WORK_FLOW_Numero) REFERENCES WORK_FLOW(WORK_FLOW_Numero),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO),
    --FOREIGN KEY (Ven_Vendedor) REFERENCES SabioReeco..Ven_Vendedores(Ven_vendedor),
	--FOREIGN KEY (Cli_Cliente) REFERENCES SabioReeco..CLI_CLIENTES(CLI_Cliente),
	--FOREIGN KEY (Pro_Proyecto) REFERENCES SabioReeco..Pro_Proyectos(Pro_proyecto),
	--FOREIGN KEY (Tal_Numero) REFERENCES SabioReeco..ALQ_TALLER(Tal_Numero)
)

CREATE TABLE dbo.TICKET_DETALLE(
	id_TICKET_DETALLE INT IDENTITY(1,1),
	CIA_Codigo varchar(3) not null,
	TICKET_Numero float Not NULL,-- REFERENCIA  dbo.TICKET
	TICKET_DETALLE_Titulo varchar(100) not null,
	TICKET_DETALLE_Observaciones text,
	TICKET_DETALLE_Estado varchar(1) not null,
	Fecha_Creacion datetime  null,
	USR_Usuario_Creacion varchar(20) NULL
	FOREIGN KEY (TICKET_Numero) REFERENCES TICKET(TICKET_Numero)
)
CREATE TABLE dbo.TICKET_TAREAS(
	id_TICKET_TAREAS INT IDENTITY(1,1),
	CIA_Codigo varchar(3) not null,
	TICKET_Numero float Not NULL,-- REFERENCIA dbo.TICKET
	DEP_DEPARTAMENTO varchar(10) NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USU_USUARIOS varchar(10) Not NULL, -- REFERENCIA   dbo.USUARIOS
	TICKET_TAREAS_Titulo varchar(100) not null,
	TICKET_TAREAS_Observaciones text,
	TICKET_TAREAS_Estado varchar(1) not null,-- REALIZADO O NO
	Fecha_Creacion datetime not null,
	USR_Usuario_Creacion varchar(20) NULL,
	Fecha_Cierre datetime  null,
	USR_Usuario_Cierre varchar(20) NULL,
	--PRIMARY KEY (TICKET_Numero),
	FOREIGN KEY (TICKET_Numero) REFERENCES TICKET(TICKET_Numero),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO),
	FOREIGN KEY (USU_USUARIOS) REFERENCES USUARIOS(USU_USUARIOS)
)


