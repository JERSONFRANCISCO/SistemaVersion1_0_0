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
			//$GRU_Titulo = "Usuarios sistema";
			require_once(__CTR_PATH . "ctr_grupo.php");
			$ctr_grupo = new ctr_grupo();
			$ctr = $ctr_grupo->obtener_Grupos();
			return $this->postdata->obtener_opcionesMenu($ctr[0][0]);
		}
		public function obtener_opcionesMenu_($grupo)
		{
			return $this->postdata->obtener_opcionesMenu($grupo);
		}
	}

	?>