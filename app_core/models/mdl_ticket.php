<?php
require_once 'mdl_conexion.php';


class mdl_ticket{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 
	public function obtener_hilo_ticket($ticketID){
		$posts=array();
		$cont=0;
		$sql = "exec pa_obtener_hilo_ticket @tic_ticket = ".$ticketID;
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];// usr
			$posts[$cont][1]=$row[1];// titulo detalle
			$posts[$cont][2]=$row[2];// contenido
			$posts[$cont][3]=$row[3];//  fecha
			$posts[$cont][4]=$row[4];// rol
			$cont++;
		}
		return $posts;
	}
	public function obtener_tarea_ticket($ticketID){
		$posts=array();
		$cont=0;
		$sql = "exec pa_obtener_tareas_ticket @tic_ticket = ".$ticketID;
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$posts[$cont][4]=$row[4];
			$posts[$cont][5]=$row[5];
			$posts[$cont][6]=$row[6];
			$cont++;
		}
		return $posts;
	}
	public function insertar_hilo_ticket($ticket,$Observaciones,$Usuario){
		$sql = " exec pa_HiloTicket @DEP_Titulo = '".$Observaciones."' ,  @tic_ticket =".$ticket.", @Usr_usuario =".$Usuario."";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
	public function insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$Usr_usuario,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion,$Fecha_Vence){
		if($TAL_Numero == ''){
			$TAL_Numero = 0;
		}

		$ticket=0;
		$sql = " exec pa_InsertarTicket  
		@Accion = 'TI',
		@Prioridad ='".$Prioridad."',
		@Ven_Vendedor ='".$Ven_Vendedor."',
		@Cli_Cliente ='".$Cli_Cliente."',
		@Pro_nombre ='".$Pro_Proyecto."',
		@Usr_usuario = '".$Usr_usuario."',
		@Tal_Descripcion = '".$TAL_Numero."' ,
		@DEP_titulo ='".$DEP_titulo."',
		@TIC_Estado = '".$TIC_Estado."',
		@TIC_Titulo = '".$TIC_Titulo."',
		@TIC_Observaciones = '".$TIC_Observaciones."',
		@USR_Usuario_Creacion = ".$USR_Usuario_Creacion." ,
		@TIC_TICKET = 0 ,
		@TIC_HORAS = 0,
		@TIC_MINUTOS = 0 ,
		@FECHA_VENCE = '".$Fecha_Vence."'";
		//echo $sql;
		$this->conexion->consulta($sql);

		$sql = "exec pa_IdTicket '".$TIC_Titulo."'";
		//echo $sql;

		$stmt = $this->conexion->consulta($sql);

		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$ticket = $row[0];
		}
		return $ticket;
	}
	public function insertar_tareas_ticket($Usr_usuario,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion,$tic_horas,$tic_minutos,$tic_ticket){
		$ticket=0;
		$sql = " exec pa_InsertarTicket  
		@Accion = 'TA',
		@Prioridad ='',
		@Ven_Vendedor ='',
		@Cli_Cliente ='',
		@Pro_nombre ='',
		@Usr_usuario = '".$Usr_usuario."',
		@Tal_Descripcion = 0 ,
		@DEP_titulo ='".$DEP_titulo."',
		@TIC_Estado = '".$TIC_Estado."',
		@TIC_Titulo = '".$TIC_Titulo."',
		@TIC_Observaciones = '".$TIC_Observaciones."',
		@USR_Usuario_Creacion = '".$USR_Usuario_Creacion."' ,
		@TIC_TICKET = ".$tic_ticket." ,
		@TIC_HORAS = ".$tic_horas.",
		@TIC_MINUTOS = ".$tic_minutos." ,@FECHA_VENCE = ''";
		
		$this->conexion->consulta($sql);
		return $ticket;
	}
	public function obtener_Tickets_cantidad($Estado,$USR_USUARIO){
		$posts=array();
		$cont=0;
		$sql = "exec pa_ObtenerTOTALTickes_PAGINACION @Estado = '".$Estado."', @Usr_Usuario = '".$USR_USUARIO."' ,@INICIA=0,@CANTIDAD=0";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$cont++;
		}
		return $posts;
	}
	public function obtener_Tickets($Estado,$USR_USUARIO,$Inicio,$Cantidad){
		$posts=array();
		$cont=0;
		$sql = "exec pa_ObtenerTickes_PAGINACION @Estado = '".$Estado."', @Usr_Usuario = '".$USR_USUARIO."',@INICIA=".$Inicio.",@CANTIDAD=".$Cantidad;
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$posts[$cont][4]=$row[4];
			$posts[$cont][5]=$row[5];
			$posts[$cont][6]=$row[6];
			$posts[$cont][7]=$row[7];
			$cont++;
		}
		return $posts;
	}
	public function pa_informacion_ticket($ticket){
		$posts=array();
		$cont=0;
		$sql = "exec pa_informacion_ticket  @tic_ticket = ".$ticket."";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$posts[$cont][4]=$row[4];
			$posts[$cont][5]=$row[5];
			$posts[$cont][6]=$row[6];
			$posts[$cont][7]=$row[7];
			$posts[$cont][8]=$row[8];
			$posts[$cont][9]=$row[9];
			$posts[$cont][10]=$row[10];
			$posts[$cont][11]=$row[11];
			$cont++;
		}
		return $posts;
	}
	public function pa_ticket_correo($ticket){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_enviar_correo @Accion='SELECT',@tic_ticket=".$ticket."";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$posts[$cont][4]=$row[4];
			$posts[$cont][5]=$row[5];
			$posts[$cont][6]=$row[6];
			$posts[$cont][7]=$row[7];
			$posts[$cont][8]=$row[8];
			$posts[$cont][9]=$row[9];
			$posts[$cont][10]=$row[10];
			$posts[$cont][11]=$row[11];
			$posts[$cont][12]=$row[12];
			$posts[$cont][13]=$row[13];
			$posts[$cont][14]=$row[14];
			$posts[$cont][15]=$row[15];
			$posts[$cont][16]=$row[16];
			$posts[$cont][17]=$row[17];
			$posts[$cont][18]=$row[18];
			$cont++;
		}
		return $posts;
	}

}
?>	
