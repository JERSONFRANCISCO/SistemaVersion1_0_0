<?php

require_once(__MDL_PATH . "mdl_estandar.php");
class ctr_estandar{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_estandar();
		}
		public function obtener_Catalogo($identificadorTabla)
		{
			return $this->postdata->obtener_Catalogo($identificadorTabla);
		}
		
	}

?>