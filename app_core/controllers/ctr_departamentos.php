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
			return $this->postdata->obtener_Objetos();
		}
		public function insertar_Departamento($Titulo,$Observaciones,$Estado,$Usuario)
		{
			return $this->postdata->insertar_Departamento($Titulo,$Observaciones,$Estado,$Usuario);
		}

	}

?>