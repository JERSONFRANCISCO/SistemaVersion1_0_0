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
			$Accion = 'SELECT';
			$WRK_DETALLE = 0;
			$Titulo = '';
			$Observaciones  = '';
			$Departamento  ='';
			$Usuario  = '';
			$Minutos  = 0;
			$Horas  = 0;
			$Estado = '';
			$USR_LOGIN = $_SESSION['USR_nombre'];
			return $this->postdata->obtener_Objetos($WRK_DETALLE,$Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$USR_LOGIN);
		}
		public function insertar_tareas()
		{
			$Accion = 'INSERT';
			$WRK_DETALLE = 0;
			$Titulo = $_POST['Titulo'];
			$Observaciones  = $_POST['Observaciones'];
			$Departamento  = $_POST['Departamento'];
			$Usuario  = $_POST['Usuario'];
			$Minutos  = $_POST['tareaMinutos'];
			$Horas  = $_POST['tareaHoras'];
			$Estado = substr($_POST['Estado'],0,1);
			$USR_LOGIN = $_SESSION['USR_nombre'];
			return $this->postdata->ejecutar_proc_tareas($WRK_DETALLE,$Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$USR_LOGIN);
		}
		public function actualizar_tareas()
		{
			$Accion = 'UPDATE';
			$WRK_DETALLE = $_POST['TareaID'];
			$Titulo = $_POST['Titulo'];
			$Observaciones  = $_POST['Observaciones'];
			$Departamento  = $_POST['Departamento'];
			$Usuario  = $_POST['Usuario'];
			$Minutos  = $_POST['tareaMinutos'];
			$Horas  = $_POST['tareaHoras'];
			$Estado = substr($_POST['Estado'],0,1);
			$USR_LOGIN = $_SESSION['USR_nombre'];
			return $this->postdata->ejecutar_proc_tareas($WRK_DETALLE,$Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$USR_LOGIN);
		}
		public function eliminar_tareas()
		{
			$Accion = 'DELETE';
			$WRK_DETALLE = $_POST['TareaID'];
			$Titulo = '';
			$Observaciones  = '';
			$Departamento  ='';
			$Usuario  = '';
			$Minutos  = 0;
			$Horas  = 0;
			$Estado = 'B';
			$USR_LOGIN = $_SESSION['USR_nombre'];
			return $this->postdata->ejecutar_proc_tareas($WRK_DETALLE,$Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$USR_LOGIN);
		}
		public function buscar_tareas()
		{
			$Accion = 'SEARCH';
			$WRK_DETALLE = $_POST['identificador'];
			$Titulo = '';
			$Observaciones  = '';
			$Departamento  ='';
			$Usuario  = '';
			$Minutos  = 0;
			$Horas  = 0;
			$Estado = '';
			$USR_LOGIN = $_SESSION['USR_nombre'];
			return $this->postdata->obtener_Objetos($WRK_DETALLE,$Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$USR_LOGIN);
		}
	}

	?>