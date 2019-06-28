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
	}

	?>