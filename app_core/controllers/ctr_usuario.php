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
			echo $_POST['Nombre'];
			echo $_POST['Correo'];
			echo $_POST['Password'];
			echo $_POST['Rol'];
			echo $_POST['Estado'];
			echo $_POST['Grupo'];
			return $this->postdata->insertar_Usuarios();
		}
		public function actualizar_Usuarios()
		{
			echo $_POST['Nombre'];
			echo $_POST['Correo'];
			echo $_POST['Password'];
			echo $_POST['Rol'];
			echo $_POST['Estado'];
			echo $_POST['Grupo'];
			return $this->postdata->insertar_Usuarios();
		}
		public function buscar_Usuarios()
		{
			echo $_POST['Nombre'];
			echo $_POST['Correo'];
			echo $_POST['Password'];
			echo $_POST['Rol'];
			echo $_POST['Estado'];
			echo $_POST['Grupo'];
			return $this->postdata->insertar_Usuarios();
		}
	}

	?>