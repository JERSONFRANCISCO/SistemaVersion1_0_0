<?php

require_once(__MDL_PATH . "mdl_crear_ticket.php");
class ctr_crear_ticket{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_crear_ticket();
		}


		public function insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion)
		{
			return $this->postdata->insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion);
		}


		/*
		public function obtener_Objetos()
		{
			return $this->postdata->obtener_Objetos();
		}

		public function actualizar_Departamento($Titulo,$Observaciones,$Estado,$Usuario,$departmento)
		{
			return $this->postdata->actualizar_Departamento($Titulo,$Observaciones,$Estado,$Usuario,$departmento);
		}

		public function buscar_Departamento($departmentoID)
		{
			return $this->postdata->buscar_Departamento($departmentoID);
		}
		*/
	}

	?>