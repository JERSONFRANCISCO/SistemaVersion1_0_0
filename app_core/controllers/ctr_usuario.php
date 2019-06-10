<?php

require_once(__MDL_PATH . "mdl_usuario.php");
class ctr_usuario{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_usuario();
		}
		public function obtener_Usuarios()
		{
			return $this->postdata->obtener_Usuarios();
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}
	}

	?>