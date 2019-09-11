<?php

require_once(__MDL_PATH . "mdl_ticket.php");
class ctr_ticket{
	private $postdata;

		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_ticket();
		}
		
		public function obtener_Tickets($Estado,$USR_USUARIO,$Inicio,$Cantidad)
		{
			return $this->postdata->obtener_Tickets($Estado,$USR_USUARIO,$Inicio,$Cantidad);
		}
		public function obtener_Tickets_cantidad($Estado,$USR_USUARIO)
		{
			return $this->postdata->obtener_Tickets_cantidad($Estado,$USR_USUARIO);
		}
		public function pa_informacion_ticket($ticket)
		{
			return $this->postdata->pa_informacion_ticket($ticket);
		}
		public function insertar_ticket()
		{
			$Prioridad=substr($_POST['Prioridad'], 0,1) ;
			$Ven_Vendedor=$_POST['NombreVendedor'];
			$Cli_Cliente=$_POST['NombreClienteAJAX'];
			$Pro_Proyecto=$_POST['ProyectoClienteAjax'];
			$Usr_usuario=$_POST['NombreUsuario'];
			$TAL_Numero=$_POST['OrdenDeTrabajoAJAX'];
			$DEP_titulo=$_POST['NombreDepartamento'];
			$TIC_Estado='A';
			$TIC_Titulo=$_POST['tituloTicket'];
			$TIC_Observaciones=$_POST['summernote'];
			$USR_Usuario_Creacion=$_SESSION['USR_user'];
			$Fecha_Vence=$_POST['Fecha_Vence'];
			
			return $this->postdata->insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$Usr_usuario,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion,$Fecha_Vence);
		}
		public function insertar_tareas_ticket($tic_ticket)
		{
			if(isset($_POST['numeroDeTareas'])){
				for($i = 0 ; $i <=$_POST['numeroDeTareas'] ; $i++ ){
					if(isset($_POST['tareatareaTitulo'.$i])){
						$Usr_usuario=$_POST['tareatareaUsuario'.$i];
						$DEP_titulo=$_POST['tareaTareaDepartamento'.$i];
						$TIC_Estado='A';
						$TIC_Titulo=$_POST['tareatareaTitulo'.$i];
						$TIC_Observaciones=$_POST['tareatareaDescripcion'.$i];
						$USR_Usuario_Creacion=$_SESSION['USR_user'];
						$tic_horas=$_POST['tareatareaHoras'.$i];
						$tic_minutos=$_POST['tareatareaMinutos'.$i];

						$this->postdata->insertar_tareas_ticket($Usr_usuario,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion,$tic_horas,$tic_minutos,$tic_ticket);
					}
				}
			}

			return "true";
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