<?php
	
	require_once(__MDL_PATH . "mdl_usuario.php");
	class ctr_grupo{
		private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_grupo();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}
		public function insertar_Grupo($Titulo,$Observaciones,$Estado,$Departamento,$Usuario)
		{
			return $this->postdata->insertar_Grupo($Titulo,$Observaciones,$Estado,$Departamento,$Usuario);
		}
	}

?>