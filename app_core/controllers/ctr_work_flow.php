<?php

require_once(__MDL_PATH . "mdl_work_flow.php");
class ctr_work_flow{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_work_flow();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}
		public function obtener_Tareas($WRK_WORK_FLOW){
			$Accion='TAREAS';
			return $this->postdata->obtener_Tareas($Accion,$WRK_WORK_FLOW);
		}
		public function obtener_Tareas_nombre($WRK_WORK_FLOW){
			$Accion='TAREA_';
			return $this->postdata->obtener_Tareas_nombre($Accion,$WRK_WORK_FLOW);
		}
		public function obtener_Tareas_Disponibles($WRK_WORK_FLOW){
			$Accion='WRKNEW';
			return $this->postdata->obtener_Tareas($Accion,$WRK_WORK_FLOW);
		}

		public function agregar_work_flow(){
			$Accion = "INSERT";
			$WRK_WORK_FLOW = 0;
			$WRK_Titulo = $TAL_Numero=$_POST['Titulo'];
			$WRK_Observaciones = $TAL_Numero=$_POST['Observaciones'];
			$WRK_Estado = substr($_POST['Estado'],0,1);
			$DEP_titulo= $_POST['Departamento'];
			$USR_Usuario_Creacion = $_SESSION['USR_nombre'];
			$WRK_DETALLE=0;
			$this->postdata->ejecutar_proc_workflow($Accion,$WRK_WORK_FLOW,$WRK_Titulo,$WRK_Observaciones,$WRK_Estado,$DEP_titulo,$WRK_DETALLE,$USR_Usuario_Creacion);
			return $this->postdata->pa_WorkFlow_ultimo_ingreso();
		}
		public function actualizar_work_flow(){
			$Accion = "UPDATE";
			$WRK_WORK_FLOW = $_POST['TareaID'];
			$WRK_Titulo = $TAL_Numero=$_POST['Titulo'];
			$WRK_Observaciones = $TAL_Numero=$_POST['Observaciones'];
			$WRK_Estado = substr($_POST['Estado'],0,1);
			$DEP_titulo= $_POST['Departamento'];
			$USR_Usuario_Creacion = $_SESSION['USR_nombre'];
			$WRK_DETALLE=0;
			return $this->postdata->ejecutar_proc_workflow($Accion,$WRK_WORK_FLOW,$WRK_Titulo,$WRK_Observaciones,$WRK_Estado,$DEP_titulo,$WRK_DETALLE,$USR_Usuario_Creacion);
		}
		public function agregar_tarea_work_flow($WRK_WORK_FLOW){
			$Accion = "DELETE";
			$WRK_WORK_FLOW = $WRK_WORK_FLOW;
			$WRK_Titulo = $TAL_Numero='';
			$WRK_Observaciones = '';
			$WRK_Estado = '';
			$DEP_titulo = '';
			$USR_Usuario_Creacion = '';
			$WRK_DETALLE=0;

			// borramos las asociaciones
			$this->postdata->ejecutar_proc_workflow($Accion,$WRK_WORK_FLOW,$WRK_Titulo,$WRK_Observaciones,$WRK_Estado,$DEP_titulo,$WRK_DETALLE,$USR_Usuario_Creacion);

			$Accion = "TASK";

			foreach($_POST as $nombre_campo => $valor){
				if(strpos($nombre_campo,'identificador') !== false){
					$WRK_DETALLE = $valor;
					$this->postdata->ejecutar_proc_workflow($Accion,$WRK_WORK_FLOW,$WRK_Titulo,$WRK_Observaciones,$WRK_Estado,$DEP_titulo,$WRK_DETALLE,$USR_Usuario_Creacion);
				} 
			}
			return 'true';
		}

	}

	?>