<?php

require_once(__MDL_PATH . "mdl_departamentos.php");
class ctr_departamentos{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_departamentos();
		}
		
		public function obtener_Objetos()
		{
			$Accion = 'SELECT';
			return $this->postdata->obtener_Objetos();
		}
		public function obtener_Departamentos()
		{
			$Accion = 'SELECT';
			return $this->postdata->obtener_Departamentos();
		}

		public function insertar_Departamento()
		{
			$Accion = 'INSERT';
			$Departamentoid=0;
			$Titulo = $_POST['Nombre'];
			$Observaciones = $_POST['Descripcion'];
			$Estado = substr($_POST['Estado'], 0,1);
			$USR_LOGIN = $_SESSION['USR_nombre'];
			
			return $this->postdata->ejecutar_proc_departamento($Accion,$Titulo,$Observaciones,$Estado,$Departamentoid,$USR_LOGIN);
		}

		public function actualizar_Departamento()
		{
			$Accion = 'UPDATE';
			$Departamentoid=$_POST['Departamentoid'];
			$Titulo = $_POST['Nombre'];
			$Observaciones = $_POST['Descripcion'];
			$Estado = substr($_POST['Estado'], 0,1);
			$USR_LOGIN = $_SESSION['USR_nombre'];
			return $this->postdata->ejecutar_proc_departamento($Accion,$Titulo,$Observaciones,$Estado,$Departamentoid,$USR_LOGIN);
		}
		public function eliminar_Departamento()
		{
			$Accion = 'DELETE';
			$Departamentoid=$_POST['Departamentoid'];
			$Titulo = '';
			$Observaciones = '';
			$Estado = 'B';
			$USR_LOGIN = $_SESSION['USR_nombre'];
			return $this->postdata->ejecutar_proc_departamento($Accion,$Titulo,$Observaciones,$Estado,$Departamentoid,$USR_LOGIN);
		}
		public function buscar_Departamento()
		{
			$Accion = 'SEARCH';
			$Departamentoid=$_POST['identificador'];
			return $this->postdata->buscar_Departamento($Accion,$Departamentoid);
		}
	}

	?>