<?php
require_once 'mdl_conexion.php';


class mdl_usuario{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	
	public function obtener_Usuarios(){
		$posts=array();
		$cont=0;
		$sql = "exec pa_Usuarios @Accion = 'C' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$cont++;
		}
		return $posts;
	}
}
?>	
