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
			$Estado = substr($_POST['Estado'],0,1);

			return $this->postdata->insertar_tareas($Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$_SESSION['USR_nombre']);
		}
		public function actualizar_tareas()
		{
			$Accion = 'U';
			$WRK_DETALLE = $_POST['TareaID'];
			$Titulo = $_POST['Titulo'];
			$Observaciones  = $_POST['Observaciones'];
			$Departamento  = $_POST['Departamento'];
			$Usuario  = $_POST['Usuario'];
			$Minutos  = $_POST['tareaMinutos'];
			$Horas  = $_POST['tareaHoras'];
			$Estado = substr($_POST['Estado'],0,1);

		//	echo $Accion,$WRK_DETALLE,$Titulo,$Observaciones,$Usuario,$Minutos,$Horas,$Estado;
			return $this->postdata->actualizar_tareas($WRK_DETALLE,$Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$_SESSION['USR_nombre']);
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