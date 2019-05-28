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
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$posts[$cont][4]=$row[4];
			$cont++;
		}
		return $posts;
	}
	public function insertar_hilo_ticket($Titulo,$Observaciones,$Estado,$Usuario){
		$sql = " exec pa_HiloTicet @DEP_Titulo = '".$Observaciones."'";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
	public function insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$Usr_usuario,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion){
		if($TAL_Numero == ''){
			$TAL_Numero = 0;
		}
		$ticket=0;
		$sql = " exec pa_InsertarTicket  
		@Accion = 'TI',
		@Prioridad ='".$Prioridad."',
		@Ven_Vendedor ='".$Ven_Vendedor."',
		@Cli_Cliente ='".$Cli_Cliente."',
		@Pro_Proyecto ='".$Pro_Proyecto."',
		@Usr_usuario = '".$Usr_usuario."',
		@TAL_Numero = ".$TAL_Numero." ,
		@DEP_titulo ='".$DEP_titulo."',
		@TIC_Estado = '".$TIC_Estado."',
		@TIC_Titulo = '".$TIC_Titulo."',
		@TIC_Observaciones = '".$TIC_Observaciones."',
		@USR_Usuario_Creacion = '".$USR_Usuario_Creacion."' ,
		@TIC_TICKET = 0 ,
		@TIC_HORAS = 0,
		@TIC_MINUTOS = 0";
		
		$this->conexion->consulta($sql);

		$sql = "exec pa_IdTicket '".$TIC_Titulo."'";

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
		@Pro_Proyecto ='',
		@Usr_usuario = '".$Usr_usuario."',
		@TAL_Numero = 0 ,
		@DEP_titulo ='".$DEP_titulo."',
		@TIC_Estado = '".$TIC_Estado."',
		@TIC_Titulo = '".$TIC_Titulo."',
		@TIC_Observaciones = '".$TIC_Observaciones."',
		@USR_Usuario_Creacion = '".$USR_Usuario_Creacion."' ,
		@TIC_TICKET = ".$tic_ticket." ,
		@TIC_HORAS = ".$tic_horas.",
		@TIC_MINUTOS = ".$tic_minutos;
		
		$this->conexion->consulta($sql);
		return $ticket;
	}
	public function obtener_Tickets($Estado){
		$posts=array();
		$cont=0;
		$sql = "exec pa_ObtenerTickes @Accion = 'TA' , @Estado = '".$Estado."'";
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


}
?>	
