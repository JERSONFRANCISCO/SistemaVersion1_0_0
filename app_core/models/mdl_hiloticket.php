<?php
require_once 'mdl_conexion.php';


class mdl_departamentos{

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
	public function insertar_HILOTICKET($Titulo,$Observaciones,$Estado,$Usuario){
		$posts=array();
		$cont=0;
		$sql = " exec pa_HiloTicet @DEP_Titulo = '".$Observaciones."'";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
	public function buscar_Departamento($departmentoID){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Departametos @Accion = 'F', @DEP_Titulo = '', @DEP_Observaciones='', @DEP_Estado='A',@DEP_Departameto=".$departmentoID.",@USR_Usuario_Creacion='' ";
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
	public function actualizar_Departamento($Titulo,$Observaciones,$Estado,$Usuario,$Departamento){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Departametos @Accion = 'U', @DEP_Titulo = '".$Titulo."', @DEP_Observaciones='".$Observaciones."', @DEP_Estado='".$Estado."',@DEP_Departameto = " .$Departamento." ,@USR_Usuario_Creacion='".$Usuario."'";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
}
?>	
