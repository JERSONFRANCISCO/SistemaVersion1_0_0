<?php

require_once(__MDL_PATH . "mdl_ticket.php");
class ctr_ticket{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_ticket();
		}
		
		public function obtener_Tickets($Estado,$USR_USUARIO)
		{
			return $this->postdata->obtener_Tickets($Estado,$USR_USUARIO);
		}
		public function pa_informacion_ticket($ticket)
		{
			return $this->postdata->pa_informacion_ticket($ticket);
		}
		public function insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$Usr_usuario,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion)
		{
			return $this->postdata->insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$Usr_usuario,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion);
		}
		public function insertar_tareas_ticket($Usr_usuario,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion,$tic_horas,$tic_minutos,$tic_ticket)
		{
			return $this->postdata->insertar_tareas_ticket($Usr_usuario,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion,$tic_horas,$tic_minutos,$tic_ticket);
		}
		public function obtener_hilo_ticket($ticketID)
		{
			return $this->postdata->obtener_hilo_ticket($ticketID);
		}
		public function obtener_tarea_ticket($ticketID)
		{
			return $this->postdata->obtener_tarea_ticket($ticketID);
		}
		public function insertar_hilo_ticket($ticket,$Observaciones,$Usuario)
		{
			return $this->postdata->insertar_hilo_ticket($ticket,$Observaciones,$Usuario);
		}
	}

	?>