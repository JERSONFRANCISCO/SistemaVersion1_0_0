<?php

require_once(__MDL_PATH . "mdl_tickets_abiertos.php");
class ctr_tickets_abiertos{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_tickets_abiertos();
		}
		
		public function obtener_Objetos($Estado)
		{
			return $this->postdata->obtener_Objetos($Estado);
		}
	}

	?>