<?php
	
	require_once(__MDL_PATH . "mdl_inicio.php");
	class ctr_inicio{
		private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_inicio();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}
	}

?>