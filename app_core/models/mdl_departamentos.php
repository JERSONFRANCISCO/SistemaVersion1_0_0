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
		$sql = "EXEC pa_Departametos @Accion = 'SELECT', @DEP_Titulo = '', @DEP_Observaciones='', @DEP_Departameto=0, @DEP_Estado='A',@USR_Usuario_Creacion=''";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$posts[$cont][4]=$row[4];
			$cont++;
		}
		return $posts;
	}
	public function obtener_Departamentos(){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Departametos @Accion = 'C', @DEP_Titulo = '', @DEP_Observaciones='', @DEP_Departameto=0, @DEP_Estado='A',@USR_Usuario_Creacion=''";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$cont++;
		}
		return $posts;
	}
	public function buscar_Departamento($Accion,$Departamentoid){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Departametos @Accion = '".$Accion."', @DEP_Titulo = '', @DEP_Observaciones='', @DEP_Estado='A',@DEP_Departameto=".$Departamentoid.",@USR_Usuario_Creacion='' ";
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
	public function ejecutar_proc_departamento($Accion,$Titulo,$Observaciones,$Estado,$Departamentoid,$USR_LOGIN){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Departametos @Accion = '".$Accion."', @DEP_Titulo = '".$Titulo."', @DEP_Observaciones='".$Observaciones."', @DEP_Estado='".$Estado."',@DEP_Departameto = " .$Departamentoid." ,@USR_Usuario_Creacion='".$USR_LOGIN."'";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
}
?>	
