<?php

require_once(__MDL_PATH . "mdl_crear_ticket.php");
class ctr_crear_ticket{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_crear_ticket();
		}
		
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}

		public function insertar_hilo_ticket($Titulo,$Observaciones,$Estado,$Usuario)
		{
			return $this->postdata->insertar_ticket($Titulo,$Observaciones,$Estado,$Usuario);
		}

		public function actualizar_Departamento($Titulo,$Observaciones,$Estado,$Usuario,$departmento)
		{
			return $this->postdata->actualizar_Departamento($Titulo,$Observaciones,$Estado,$Usuario,$departmento);
		}

		public function buscar_Departamento($departmentoID)
		{
			return $this->postdata->buscar_Departamento($departmentoID);
		}
	}

	?>