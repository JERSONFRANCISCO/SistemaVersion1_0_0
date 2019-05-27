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
		$sql = "pa_Estandar @Accion = 'CA' , @DEP_TABLA ='".$identificadorTabla."' , @DEP_TABLA2 = '' ";
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
		$sql = "pa_Estandar @Accion = 'CL' , @DEP_TABLA ='' , @DEP_TABLA2 = ''";
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
		$sql = "pa_Estandar @Accion = 'VD' , @DEP_TABLA ='' , @DEP_TABLA2 = ''";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$cont++;
		}
		return $posts;
	}

	//  se obtienen los proyectos de un cliente en especifico
	public function obtener_Proyectos_Cliente($cliente){
		$posts='';
		$sql = "pa_Estandar @Accion = 'PC' , @DEP_TABLA ='".$cliente."' , @DEP_TABLA2 = '' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts.="<option data-subtext='".$row[0]."'>".$row[1]."</option>";
		}
		echo $posts;
	}
	public function obtener_OrdenesTrabajo_Cliente($cliente,$proyecto){
		$posts='';
		$cont=0;
		$sql = "pa_Estandar @Accion = 'OT' , @DEP_TABLA ='".$cliente."' , @DEP_TABLA2 = '".$proyecto."'";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts.="<option data-subtext='".$row[0]."'>".$row[1]."</option>";
		}
		echo $posts;
	}
	public function obtener_WorkFLow(){
		$posts=array();
		$cont=0;
		$sql = "pa_Estandar @Accion = 'WF' , @DEP_TABLA ='' , @DEP_TABLA2 = ''";
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
