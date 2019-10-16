<?php

require_once(__MDL_PATH . "mdl_grupo.php");
class ctr_grupo{
	private $postdata;

		public function __construct()
		{
			$this->postdata = new mdl_grupo();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}
		public function insertar_Grupo()
		{
			$Accion ='INSERT';
			$Titulo = $_POST['Nombre'];
			$Observaciones = $_POST['Descripcion'];
			$Estado = substr($_POST['Estado'], 0,1);
			$Departamento = $_POST['Departamento'];
			$Usuario = $_SESSION['USR_nombre'];
			$Grupo=0;
			return $this->postdata->ejecutar_proc_Grupo($Accion,$Titulo,$Observaciones,$Estado,$Departamento,$Grupo,$Usuario);
		}
		public function actualizar_Grupo()
		{
			$Accion ='UPDATE';
			$Titulo = $_POST['Nombre'];
			$Observaciones = $_POST['Descripcion'];
			$Estado = substr($_POST['Estado'], 0,1);
			$Departamento = $_POST['Departamento'];
			$Usuario = $_SESSION['USR_nombre'];
			$Grupo=$_POST['Grupo'];
			return $this->postdata->ejecutar_proc_Grupo($Accion,$Titulo,$Observaciones,$Estado,$Departamento,$Grupo,$Usuario);
		}
		public function eliminar_Grupo()
		{
			$Accion ='DELETE';
			$Titulo = '';
			$Observaciones = '';
			$Estado = 'B';
			$Departamento = '';
			$Usuario = $_SESSION['USR_nombre'];
			$Grupo=$_POST['Grupo'];
			return $this->postdata->ejecutar_proc_Grupo($Accion,$Titulo,$Observaciones,$Estado,$Departamento,$Grupo,$Usuario);
		}

		public function buscar_Grupo($id)
		{
			return $this->postdata->buscar_Grupo($id);
		}
		public function obtener_Grupos(){
			return $this->postdata->obtener_Grupos();
		}
	}

	?>