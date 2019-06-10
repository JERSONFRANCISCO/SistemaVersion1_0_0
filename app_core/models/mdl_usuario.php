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

	public function obtener_Objetos(){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Usuarios @Accion = 'S'";
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
}
?>	
