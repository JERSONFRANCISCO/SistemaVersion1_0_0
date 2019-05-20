<?php
require_once 'mdl_conexion.php';


class mdl_estandar{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	public function obtener_Catalogo($identificadorTabla){
		$posts=array();
		$cont=0;
		$sql = "pa_Estandar @Accion = 'C' , @DEP_TABLA ='".$identificadorTabla."'";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$cont++;
		}
		return $posts;
	}
	

}
?>	
