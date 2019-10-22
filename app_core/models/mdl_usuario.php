<?php
require_once 'mdl_conexion.php';


class mdl_usuario{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	


		/*
			funcion usada para obtener usuarios activos para procesos en agregar tickets
		*/
			public function obtener_Usuarios(){
				$posts=array();
				$cont=0;
				$sql = "exec pa_Usuarios @Accion = 'C',	@UsuarioNombre='',@UsuarioCorreo= '',	@UsuarioEstado = '',	@UsuarioPassword ='',	@UsuarioInclusion ='',	@UsuarioRol ='' ,@GRU_Titulo='',@Usr_Usuario = 0";
				$stmt = $this->conexion->consulta($sql);
				while( $row = $this->conexion->obtener_Columnas($stmt)) {
					$posts[$cont][0]=$row[0];
					$cont++;
				}
				return $posts;
			}
		/*
			funcion usada para obtener todos los usuarios activos e inactivos
		*/
			public function obtener_Objetos(){
				$posts=array();
				$cont=0;
				$sql = "EXEC pa_Usuarios @UsuarioNombre ='',@UsuarioCorreo ='',	@UsuarioEstado ='',	@UsuarioPassword ='',	@UsuarioInclusion ='',	@UsuarioRol ='',@Accion = 'S',@GRU_Titulo='' ,@Usr_Usuario =0";
				$stmt = $this->conexion->consulta($sql);
				while( $row = $this->conexion->obtener_Columnas($stmt)) {
					$posts[$cont][0]=$row[0];
					$posts[$cont][1]=$row[1];
					$posts[$cont][2]=$row[2];
					$posts[$cont][3]=$row[3];
					$posts[$cont][4]=$row[4];
					$posts[$cont][5]=$row[5];
					$posts[$cont][6]=$row[6];
					$cont++;
				}
				return $posts;
			}
			public function insertar_Usuarios($Accion,$Nombre,$Correo,$Password,$Rol,$Estado,$Grupo,$userInsercion){

				$ticket=0;
				$sql = "exec pa_Usuarios @Accion = '".$Accion."',	@UsuarioNombre='".$Nombre."',@UsuarioCorreo= '".$Correo."',	@UsuarioEstado = '".$Estado."',	@UsuarioPassword ='".$Password."',	@UsuarioInclusion ='".$userInsercion."',@UsuarioRol ='".$Rol."' ,@GRU_Titulo='".$Grupo."',@Usr_Usuario = 0";
				echo $sql;
				$this->conexion->consulta($sql);
				return $ticket;

			}
			public function buscar_Usuarios($Usr_Usuario){
				$posts=array();
				$cont=0;
				$sql = "EXEC pa_Usuarios @UsuarioNombre ='',@UsuarioCorreo ='',	@UsuarioEstado ='',	@UsuarioPassword ='',	@UsuarioInclusion ='',	@UsuarioRol ='',@Accion = 'F',@GRU_Titulo='' ,@Usr_Usuario = ".$Usr_Usuario;
				$stmt = $this->conexion->consulta($sql);
				while( $row = $this->conexion->obtener_Columnas($stmt)) {
					$posts[$cont][0]=$row[0];
					$posts[$cont][1]=$row[1];
					$posts[$cont][2]=$row[2];
					$posts[$cont][3]=$row[3];
					$posts[$cont][4]=$row[4];
					$posts[$cont][5]=$row[5];
					$posts[$cont][6]=$row[6];
					$cont++;
				}
				return $posts;
			}
			public function actualizar_Usuarios($Accion,$Nombre,$Correo,$Password,$Rol,$Estado,$Grupo,$userInsercion,$usuarioID){

				$ticket=0;
				$sql = "exec pa_Usuarios @Accion = '".$Accion."',	@UsuarioNombre='".$Nombre."',@UsuarioCorreo= '".$Correo."',	@UsuarioEstado = '".$Estado."',	@UsuarioPassword ='".$Password."',	@UsuarioInclusion ='".$userInsercion."',@UsuarioRol ='".$Rol."' ,@GRU_Titulo='".$Grupo."',@Usr_Usuario =".$usuarioID;
				$this->conexion->consulta($sql);
				return $ticket;

			}
			public function eliminar_Usuarios($Accion,$Estado,$usuarioID){
				$ticket=0;
				$sql = "exec pa_Usuarios @Accion = '".$Accion."',	@UsuarioNombre='',@UsuarioCorreo= '',	@UsuarioEstado = '".$Estado."',	@UsuarioPassword ='',	@UsuarioInclusion ='',@UsuarioRol ='' ,@GRU_Titulo='',@Usr_Usuario =".$usuarioID;
				$this->conexion->consulta($sql);
				return $ticket;

			}
		}
		?>	
