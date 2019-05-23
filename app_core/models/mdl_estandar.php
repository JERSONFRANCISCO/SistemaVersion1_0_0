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
		$sql = "pa_Estandar @Accion = 'CA' , @DEP_TABLA ='".$identificadorTabla."'";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$cont++;
		}
		return $posts;
	}
	public function obtener_Clientes(){
		$posts=array();
		$cont=0;
		$sql = "pa_Estandar @Accion = 'CL' , @DEP_TABLA ='' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}
	public function obtener_Vendedores(){
		$posts=array();
		$cont=0;
		$sql = "pa_Estandar @Accion = 'VD' , @DEP_TABLA ='' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}
	public function obtener_OrdenesTrabajo(){
		$posts=array();
		$cont=0;
		$sql = "pa_Estandar @Accion = 'OT' , @DEP_TABLA ='' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}
	public function obtener_Proyectos(){
		$posts=array();
		$cont=0;
		$sql = "pa_Estandar @Accion = 'PT' , @DEP_TABLA ='' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}
	public function obtener_WorkFLow(){
		$posts=array();
		$cont=0;
		$sql = "pa_Estandar @Accion = 'WF' , @DEP_TABLA ='' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}


}
?>	
