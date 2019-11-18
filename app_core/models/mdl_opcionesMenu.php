<?php
require_once 'mdl_conexion.php';


class mdl_opcionesMenu{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	

	public function obtener_opcionesMenu($GRU_Titulo){
		$posts=array();
		$cont=0;
		$sql = "exec obtenerPermisosMenuGrupo @GRU_Titulo = '".$GRU_Titulo."'";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			//echo $row[0].$row[1].$row[2].$row[3].$row[4].$row[5].$row[5]."<br>";
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
