<?php
require_once 'mdl_conexion.php';


class mdl_inicio{

	private $conexion;
	

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	public function obtener_Menu_Rol($rolCod){
		$posts=array();
		$cont=0;
		$sql = "exec pa_MenuUsuarios @usr = '".$rolCod."'";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0]; // menu
			$posts[$cont][1]=$row[1];// submenu
			$posts[$cont][2]=$row[2];// url
			$cont++;
		}
		return $posts;
	}
	
}
?>	
