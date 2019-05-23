<?php

require_once(__MDL_PATH . "mdl_ticket.php");
class ctr_ticket{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_ticket();
		}
		
		public function obtener_Tickets($Estado)
		{
			return $this->postdata->obtener_Tickets($Estado);
		}
		public function insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion)
		{
			return $this->postdata->insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion);
		}
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}

		public function insertar_hilo_ticket($Titulo,$Observaciones,$Estado,$Usuario)
		{
			return $this->postdata->insertar_hilo_ticket($Titulo,$Observaciones,$Estado,$Usuario);
		}
	}

	?>