/*	TABLA QUE ALMACENA LOS departamentos  */
CREATE TABLE dbo.DEPARTAMENTOS(
	DEP_Departamento INT IDENTITY(1,1),
	DEP_Titulo varchar(50) not NULL,
	DEP_Observaciones varchar(100) not NULL,
	DEP_Estado varchar(1) not NULL,
	USR_Fecha_Creacion datetime not null default(getdate()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL
	PRIMARY KEY (DEP_DEPARTAMENTO)
)
select * from DEPARTAMENTOS
insert into DEPARTAMENTOS(DEP_Titulo,DEP_Observaciones,DEP_Estado,USR_Usuario_Creacion)values('DEPARTAMENTO TI','Departamento de tecnologia','A','Jerson')
/*	TABLA QUE ALMACENA LOS departamentos  */
CREATE TABLE dbo.GRUPO(
	GRU_Grupo INT IDENTITY(1,1),
	GRU_Titulo varchar(20) not NULL,
	GRU_Observaciones varchar(40) not NULL,
	GRU_Estado varchar(1) not NULL,
	DEP_DEPARTAMENTO int not null,
	USR_Fecha_Creacion datetime not null default(getdate()),
	USR_Usuario_Creacion varchar(20) NULL,
	USR_Fecha_Modificacion datetime null,
	USR_Usuario_Modificacion varchar(20) NULL
	PRIMARY KEY (GRU_Grupo),
	FOREIGN KEY (DEP_DEPARTAMENTO) REFERENCES DEPARTAMENTOS(DEP_DEPARTAMENTO)
)


alter procedure pa_Grupos(
	@Accion varchar(1),
	@GRU_Titulo varchar(50),
	@GRU_Observaciones varchar(100),
	@GRU_Estado varchar(1),
	@DEP_Departamento int ,
	@USR_Usuario_Creacion varchar(20)
	)
	as
	begin
	if(@Accion = 'S')
		begin
			select GRU_Grupo,GRU_Titulo,GRU_Observaciones,GRU_Estado,dep.DEP_DEPARTAMENTO,DEP_Titulo,CONVERT(VARCHAR, gru.USR_Fecha_Creacion, 111)
			 from GRUPO gru inner join DEPARTAMENTOS dep on gru.DEP_DEPARTAMENTO = dep.DEP_Departamento;
		end
		else
	if(@Accion = 'I')
		begin
			insert into GRUPO(GRU_Titulo,GRU_Observaciones,GRU_Estado,DEP_DEPARTAMENTO,USR_Usuario_Creacion)
			values(@GRU_Titulo,@GRU_Observaciones,@GRU_Estado,@DEP_Departamento,@USR_Usuario_Creacion)
		end

	end
---------------------------------------------------------------------------------------------------------------
ALTER procedure pa_Departametos(
	@Accion varchar(1),
	@DEP_Titulo varchar(50),
	@DEP_Observaciones varchar(100),
	@DEP_Departameto int ,
	@DEP_Estado varchar(1),
	@USR_Usuario_Creacion varchar(20)
	)
	as
	begin
	if(@Accion = 'S')
		begin
			select DEP_Departamento,DEP_Titulo,DEP_Observaciones,DEP_Estado,CONVERT(VARCHAR, dep.USR_Fecha_Creacion, 111) as USR_Fecha_Creacion
			 from DEPARTAMENTOS dep where DEP_Estado = 'A'
		end
		else
	if(@Accion = 'I')
		begin
			insert into DEPARTAMENTOS(DEP_Titulo,DEP_Observaciones,DEP_Estado,USR_Usuario_Creacion)
			values(@DEP_Titulo,@DEP_Observaciones,@DEP_Estado,@USR_Usuario_Creacion)
		end
	end
