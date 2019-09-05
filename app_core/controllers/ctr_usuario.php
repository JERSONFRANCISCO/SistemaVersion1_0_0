<?php

require_once(__MDL_PATH . "mdl_usuario.php");
class ctr_usuario{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_usuario();
		}
		public function obtener_Usuarios()
		{
			return $this->postdata->obtener_Usuarios();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}
		public function insertar_Usuarios()
		{
			$Accion = 'I';
			$usuarioID = $_POST['usuarioID'];
			$Nombre = $_POST['Nombre'];
			$Correo = $_POST['Correo'];
			$Password = $_POST['Password'];
			$Rol = substr($_POST['Rol'],0,1);
			$Estado = substr($_POST['Estado'],0,1);
			$Grupo = $_POST['Grupo'];
			$userInsercion = $_SESSION['USR_nombre'];
			return $this->postdata->insertar_Usuarios($Accion,$Nombre,$Correo,$Password,$Rol,$Estado,$Grupo,$userInsercion);
		}
		public function actualizar_Usuarios()
		{
			$Accion = 'U';
			$usuarioID = $_POST['usuarioID'];
			$Nombre = $_POST['Nombre'];
			$Correo = $_POST['Correo'];
			$Password = $_POST['Password'];
			$Rol = substr($_POST['Rol'],0,1);
			$Estado = substr($_POST['Estado'],0,1);
			$Grupo = $_POST['Grupo'];
			$userInsercion = $_SESSION['USR_nombre'];
			return $this->postdata->actualizar_Usuarios($Accion,$Nombre,$Correo,$Password,$Rol,$Estado,$Grupo,$userInsercion,$usuarioID);
		}
		public function buscar_Usuarios()
		{
			$usr_usuario = $_POST['identificador'];
			return $this->postdata->buscar_Usuarios($usr_usuario);
		}
		public function eliminar_Usuarios()
		{
			$Accion = 'D';
			$Estado = 'B';
			$usuarioID = $_POST['usuarioID'];
			return $this->postdata->eliminar_Usuarios($Accion,$Estado,$usuarioID);
		}

	}

	?>