<?php

require_once(__MDL_PATH . "mdl_opcionesMenu.php");
class ctr_opcionesMenu{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_opcionesMenu();
		}
		public function obtener_opcionesMenu()
		{
			$GRU_Titulo = "Usuarios sistema";
			return $this->postdata->obtener_opcionesMenu($GRU_Titulo);
		}

	}

?>