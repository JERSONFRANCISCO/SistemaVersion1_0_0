<?php
require_once 'mdl_conexion.php';


class mdl_ticket{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	public function obtener_Objetos(){
		$posts=array();
		$cont=0;
		$sql = "select USR_USUARIO,TIC_titulo,tic_observaciones,CONVERT(VARCHAR, USR_Fecha_Creacion, 111)  from TICKET_detalle
		order by tic_detalle desc ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$cont++;
		}
		return $posts;
	}
	public function insertar_hilo_ticket($Titulo,$Observaciones,$Estado,$Usuario){
		$posts=array();
		$cont=0;
		$sql = " exec pa_HiloTicet @DEP_Titulo = '".$Observaciones."'";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
	public function insertar_ticket($Prioridad,$Ven_Vendedor,$Cli_Cliente,$Pro_Proyecto,$TAL_Numero,$DEP_titulo,$TIC_Estado,$TIC_Titulo,$TIC_Observaciones,$USR_Usuario_Creacion){
		$sql = " exec pa_InsertarTicket  
		@Accion = 'C',
		@Prioridad ='".$Prioridad."',
		@Ven_Vendedor ='".$Ven_Vendedor."',
		@Cli_Cliente ='".$Cli_Cliente."',
		@Pro_Proyecto ='".$Pro_Proyecto."',
		@TAL_Numero = ".$TAL_Numero." ,
		@DEP_titulo ='".$DEP_titulo."',
		@TIC_Estado = 'A',
		@TIC_Titulo = '".$TIC_Titulo."',
		@TIC_Observaciones = '".$TIC_Observaciones."',
		@USR_Usuario_Creacion = '".$USR_Usuario_Creacion."' ";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
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
}
?>	
