-----------------------------------------------------------------------------------------------------------
CREATE TABLE dbo.GRUPO(
	GRU_Grupo INT IDENTITY(1,1),
	GRU_Titulo varchar(50) not NULL,
	GRU_Observaciones varchar(100) not NULL,
	GRU_Estado varchar(1) not NULL,
	DEP_Departamento int not null,
	USR_Fecha_Creacion datetime not null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL,
	UNIQUE (GRU_Grupo),
	PRIMARY KEY (GRU_Grupo),
	FOREIGN KEY (DEP_Departamento) REFERENCES DEPARTAMENTOS(DEP_Departamento),
	CONSTRAINT CHK_ESTADO_GRUPO CHECK (GRU_Estado IN('A','I','B','C','X'))
)
-----------------------------------------------------------------------------------------------------------
/*	TABLA QUE ALMACENA LOS departamentos  */
CREATE TABLE dbo.DEPARTAMENTOS(
	DEP_Departamento INT IDENTITY(1,1),
	DEP_Titulo varchar(50) not NULL,
	DEP_Observaciones varchar(100) not NULL,
	DEP_Estado varchar(1) not NULL,
	USR_Fecha_Creacion datetime not null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL
	UNIQUE (DEP_Departamento),
	UNIQUE (DEP_Titulo),
	PRIMARY KEY (DEP_Departamento),
	--FOREIGN KEY (GRU_Grupo) REFERENCES GRUPO(GRU_Grupo),
	CONSTRAINT CHK_ESTADO_DEPARTAMENTOS CHECK (DEP_Estado IN('A','I','B','C','X'))
)
-----------------------------------------------------------------------------------------------------------
/*  TABLA QUE ALMACENA LOS USUARIOS QUE VAN A UTILIZAR EL SISTEMA  */
CREATE TABLE dbo.USUARIOS(
	USR_Usuario INT IDENTITY(1,1),
	GRU_Grupo int NOT NULL,-- REFERENCIA dbo.GRUPOS 
	USR_Nombre varchar(20) not NULL,
	USR_Correo varchar(20) not NULL,
	USR_Estado varchar(1) not NULL,
	USR_Password varchar(20) not NULL,
	USR_ROL varchar(1) not null,
	USR_Fecha_Creacion datetime NOT null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL,
	UNIQUE (USR_Usuario),
	PRIMARY KEY (USR_Usuario),
    FOREIGN KEY (GRU_Grupo) REFERENCES GRUPO(GRU_Grupo),
	CONSTRAINT CHK_ESTADO_USUARIOS CHECK (USR_Estado IN('A','I','B','C','X'))
)
-----------------------------------------------------------------------------------------------------------
/*  Tabla para manejar un flujo de trabajo predefinido  */
CREATE TABLE dbo.WORK_FLOW(
	WRK_WORK_FLOW INT IDENTITY(1,1),
	WRK_Titulo varchar(100) not null,
	WRK_Observaciones text,
	WRK_Estado varchar(1) not null, -- REALIZADO O NO
	DEP_Departamento INT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USR_Fecha_Creacion datetime not null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL,
	UNIQUE (WRK_WORK_FLOW),
	PRIMARY KEY (WRK_WORK_FLOW),
	FOREIGN KEY (DEP_Departamento) REFERENCES DEPARTAMENTOS(DEP_Departamento),
	--FOREIGN KEY (USR_Usuario) REFERENCES USUARIOS(USR_Usuario),
	CONSTRAINT CHK_ESTADO_WORK_FLOW CHECK (WRK_Estado IN('A','I','B','C','X'))
) 
-----------------------------------------------------------------------------------------------------------
/*  Tabla que almacena las tareas del workflow  */
CREATE TABLE dbo.WORK_FLOW_TAREAS(
	WOR_DETALLE INT IDENTITY(1,1),
	WOR_WORK_FLOW INT Not NULL,	  -- REFERENCIA  dbo.WORK_FLOW
	DEP_DEPARTAMENTO INT NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USR_Usuario INT NULL,		  -- REFERENCIA   dbo.USUARIOS
	WOR_Titulo varchar(100) not null,
	WOR_Observaciones text,
	WOR_Estado varchar(1) not null,-- REALIZADO O NO
	WOR_Peso int null,
	WOR_Dias varchar(3) null,
	WOR_Horas varchar(3) null,
	USR_Fecha_Creacion datetime not null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Cierre datetime null,
	USR_Usuario_Cierre varchar(20) NULL,
	UNIQUE (WOR_DETALLE),
	FOREIGN KEY (WOR_WORK_FLOW) REFERENCES WORK_FLOW(WRK_WORK_FLOW),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO),
	FOREIGN KEY (USR_Usuario) REFERENCES USUARIOS(USR_Usuario),
	CONSTRAINT CHK_ESTADO_WORK_FLOW_TAREAS CHECK (WOR_Estado IN('A','I','B','C','X'))
)
-----------------------------------------------------------------------------------------------------------
CREATE TABLE dbo.TICKET(
	TIC_Ticket INT IDENTITY(1,1),
	CIA_Codigo varchar(3) not null,
	Ven_Vendedor varchar(7) null,
	Cli_Cliente varchar(10) null,
	Pro_Proyecto varchar(4) null, -- Pro_Proyectos
	Tal_Numero float null, -- Alq_taller
	WRK_WORK_FLOW  INT NULL, -- REFETENCIA dbo.WORK_FLOW
	DEP_DEPARTAMENTO INT NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USR_Usuario INT NULL,--
	TIC_Titulo varchar(100) not null,
	TIC_Observaciones text,
	TIC_Estado varchar(1) not null,
	TIC_Porcentaje_Completado int not null default(0),
	USR_Fecha_Creacion datetime not null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL ,
	USR_Fecha_Cierre datetime  null,
	USR_Usuario_Cierre varchar(20) NULL,
	USR_Fecha_Reapertura datetime  null,
	USR_Usuario_Reapertura varchar(20) NULL,
	USR_Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL,
	TIC_Fecha_Vencimiento datetime  null,
	TIC_Prioridad varchar(1) not null,
	UNIQUE (TIC_TICKET),
	PRIMARY KEY (TIC_TICKET),
	FOREIGN KEY (WRK_WORK_FLOW) REFERENCES WORK_FLOW(WRK_WORK_FLOW),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO),
	FOREIGN KEY (USR_Usuario) REFERENCES USUARIOS(USR_Usuario),
	CONSTRAINT CHK_ESTADO_TICKET CHECK (TIC_Estado IN('A','I','B','C','X'))
)
-----------------------------------------------------------------------------------------------------------
/*  EL DETALLE DEL TICKET VA A SER EL MURO DE PUBLICACIONES O EL HILO DE HISTORÍAS DE ESTE */
CREATE TABLE dbo.TICKET_DETALLE( 
	TIC_DETALLE INT IDENTITY(1,1),
	CIA_Codigo varchar(3) null,
	TIC_TICKET INT Not NULL,-- REFERENCIA  dbo.TICKET
	USR_Usuario varchar(10) Not NULL, -- referencia al usuario que genero el detalle
	TIC_Titulo varchar(100) not null,
	TIC_Observaciones text, -- hilo del ticket
	TIC_Estado varchar(1) not null,
	USR_Fecha_Creacion datetime NOT null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL,
	UNIQUE (TIC_DETALLE),
	PRIMARY KEY(TIC_DETALLE),
	FOREIGN KEY (TIC_TICKET) REFERENCES TICKET(TIC_TICKET),
	CONSTRAINT CHK_ESTADO_TICKET_DETALLE CHECK (TIC_Estado IN('A','I','B','C','X'))
)
-----------------------------------------------------------------------------------------------------------
CREATE TABLE dbo.TICKET_TAREAS(
	TIC_Tareas INT IDENTITY(1,1),
	CIA_Codigo varchar(3) not null,
	TIC_Ticket int Not NULL,-- REFERENCIA dbo.TICKET
	DEP_Departamento INT NOT NULL,-- REFERENCIA dbo.DEPARTAMENTOS 
	USR_Usuario INT Not NULL, -- REFERENCIA   dbo.USUARIOS
	TIC_Titulo varchar(100) not null,
	TIC_Observaciones text,
	TIC_Estado varchar(1) not null,-- REALIZADO O NO
	TIC_Peso int null,
	TIC_Dias varchar(3) null,
	TIC_Horas varchar(3) null,
	USR_Fecha_Creacion datetime not null DEFAULT(GETDATE()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Cierre datetime  null,
	USR_Usuario_Cierre varchar(20) NULL,
	PRIMARY KEY (TIC_Tareas),
	UNIQUE (TIC_Tareas),
	FOREIGN KEY (TIC_Ticket) REFERENCES TICKET(TIC_Ticket),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO),
	FOREIGN KEY (USR_Usuario) REFERENCES USUARIOS(USR_Usuario),
	CONSTRAINT CHK_ESTADO_TICKET_TAREAS CHECK (TIC_Estado IN('A','I','B','C','X'))
)
-----------------------------------------------------------------------------------------------------------
create table CATALOGO(
	CAT_Catalogo int identity(1,1) ,
	CAT_Tabla VARCHAR(10) NOT NULL ,
	CAT_Estado varchar(1) not null,
	PRIMARY KEY (CAT_Catalogo),
	CONSTRAINT CHK_ID_UNICO_CATALOGO UNIQUE(CAT_Catalogo),
	CONSTRAINT CHK_TABLA_UNICA UNIQUE(CAT_Tabla),
)--DROP TABLE CATALOGO  DROP TABLE CATALOGO_DETALLE
-----------------------------------------------------------------------------------------------------------
create table CATALOGO_DETALLE(
	CAT_Detalle int identity(1,1),
	CAT_Catalogo int NOT NULL, -- REFERENCIA A CATALOGO DETALLE
	CAT_Tabla VARCHAR(10) NOT NULL, -- REFERENCIA A EL ENCABEZADO
	CAT_Contraccion varchar(1) NOT NULL,
	CAT_Descripcion VARCHAR(30),
	CAT_Estado varchar(1) not null,
	PRIMARY KEY (CAT_Detalle),
	CONSTRAINT CHK_ID_UNICO_CATALOGO_DETALLE UNIQUE (CAT_Detalle),
	CONSTRAINT CHK_DETALLE_EXISTENTE UNIQUE (CAT_Descripcion),
	CONSTRAINT CHK_ID_CATALOGO FOREIGN KEY (CAT_Catalogo) REFERENCES CATALOGO(CAT_Catalogo),
	CONSTRAINT CHK_TABLA_CATALOGO FOREIGN KEY (CAT_Tabla) REFERENCES CATALOGO(CAT_Tabla),
)