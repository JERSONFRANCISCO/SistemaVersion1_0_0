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
			return $this->postdata->obtener_Objetos();
		}
	}

	?>