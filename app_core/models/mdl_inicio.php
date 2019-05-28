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
		$sql = "EXEC pa_Departametos @Accion = 'S', @DEP_Titulo = '', @DEP_Observaciones='', @DEP_Departameto=0, @DEP_Estado='A',@USR_Usuario_Creacion=''";
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
	public function insertar_Departamento($Titulo,$Observaciones,$Estado,$Usuario){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Departametos @Accion = 'I', @DEP_Titulo = '".$Titulo."', @DEP_Observaciones='".$Observaciones."', @DEP_Estado='".$Estado."',@DEP_Departameto=0,@USR_Usuario_Creacion='".$Usuario."'";
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
