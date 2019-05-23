<?php

require_once(__MDL_PATH . "mdl_hilo_ticket.php");
class ctr_hilo_Ticket{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_hilo_ticket();
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