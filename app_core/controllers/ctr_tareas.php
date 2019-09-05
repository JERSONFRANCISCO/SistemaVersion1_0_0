<?php

require_once(__MDL_PATH . "mdl_tareas.php");
class ctr_tareas{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_tareas();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}

		public function insertar_tareas()
		{
			$Accion = 'I';
			$Titulo = $_POST['Titulo'];
			$Observaciones  = $_POST['Observaciones'];
			$Departamento  = $_POST['Departamento'];
			$Usuario  = $_POST['Usuario'];
			$Minutos  = $_POST['tareaMinutos'];
			$Horas  = $_POST['tareaHoras'];
			$Estado  = $_POST['Estado'];

			echo $Accion;
			echo $Titulo;
			echo $Observaciones;
			echo $Departamento;
			echo $Usuario;
			echo $Minutos;
			echo $Horas;
			echo $Estado;

			//$usuarioID = $_POST['usuarioID'];
			//$Nombre = $_POST['Nombre'];
			//$Correo = $_POST['Correo'];
			//$Password = $_POST['Password'];
			//$Rol = substr($_POST['Rol'],0,1);
			//$Estado = substr($_POST['Estado'],0,1);
			//$Grupo = $_POST['Grupo'];
			//$userInsercion = $_SESSION['USR_nombre'];

			return $this->postdata->insertar_tareas($Accion);
		}
		public function actualizar_tareas()
		{
			$Accion = 'U';
			return $this->postdata->actualizar_tareas($Accion);
		}
		public function eliminar_tareas()
		{
			$Accion = 'D';
			$Estado = 'B';
			$usuarioID = $_POST['usuarioID'];
			return $this->postdata->eliminar_tareas($Accion,$Estado,$usuarioID);
		}
	}

	?>