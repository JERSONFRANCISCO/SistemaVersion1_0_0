<?php

require_once(__MDL_PATH . "mdl_ticket.php");
require_once(__CTR_PATH . "ctr_enviar_correo.php");

class ctr_ticket{
	private $postdata;
	private $mail;
		public function __construct() //CONSTRUCTOR
		{
			$this->postdata = new mdl_ticket();
			$this->mail = new ctr_enviar_correo();
		}
		
		public function obtener_Tickets($Estado,$USR_USUARIO)
		{
			return $this->postdata->obtener_Tickets($Estado,$USR_USUARIO);
		}

		public function obtener_Tickets_paginacion($Estado,$USR_USUARIO,$Inicio,$Cantidad)
		{
			return $this->postdata->obtener_Tickets_paginacion($Estado,$USR_USUARIO,$Inicio,$Cantidad);
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
			require_once("global.php");
			require_once(__MDL_PATH . "mdl_html.php");
			$HTML = new mdl_Html();

			$postid=0;
			foreach($_POST as $nombre_campo => $valor){
				//echo "<br>".$nombre_campo."--".$valor."<br>";

				if(strpos($nombre_campo,'tareatareaUsuario') !== false){
					$postid = str_replace("tareatareaUsuario", "", $nombre_campo);
					//echo "id de una row".$postid;
					$Usr_usuario=$_POST['tareatareaUsuario'.$postid];
					$DEP_titulo=$_POST['tareaTareaDepartamento'.$postid];
					$TIC_Estado='A';
					$TIC_Titulo=$_POST['tareatareaTitulo'.$postid];
					$TIC_Observaciones=$_POST['tareatareaDescripcion'.$postid];
					$USR_Usuario_Creacion=$_SESSION['USR_user'];
					$tic_horas=$_POST['tareatareaHoras'.$postid];
					$tic_minutos=$_POST['tareatareaMinutos'.$postid];

					$this->postdata->insertar_tareas_ticket($Usr_usuario,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion,$tic_horas,$tic_minutos,$tic_ticket);

				} 

			}
			
			$to=$this->postdata->pa_ticket_correo_mails($tic_ticket);
			$Subject="Hola, se ha registrado un ticket en el que participas, # ".$tic_ticket;
			$cuerpo = $HTML->armar_correo_ticket_nuevo($tic_ticket);			
			$non_HTML="fALLÓ EL ENVIO DEL HTML";

			$this->mail->enviar_correo($to,$Subject,$cuerpo,$non_HTML);
			
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