<?php
require_once 'mdl_conexion.php';


class mdl_crear_ticket{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	

	/*
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
	}*/
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
	
}
?>	
