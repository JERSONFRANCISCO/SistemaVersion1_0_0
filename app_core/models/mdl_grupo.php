<?php
require_once 'mdl_conexion.php';


class mdl_grupo{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	
	public function obtener_Objetos(){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Grupos @Accion = 'SELECT', @GRU_Titulo = '', @GRU_Observaciones='', @GRU_Estado='A',@Gru_Grupo=0,@DEP_Departamento='', @USR_Usuario_Creacion='' ";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$posts[$cont][1]=$row[1];
			$posts[$cont][2]=$row[2];
			$posts[$cont][3]=$row[3];
			$posts[$cont][4]=$row[4];
			$posts[$cont][5]=$row[5];
			$cont++;
		}
		return $posts;
	}
	public function buscar_Grupo($grupoid){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Grupos @Accion = 'F', @GRU_Titulo = '', @GRU_Observaciones='', @GRU_Estado='A', @Gru_Grupo=".$grupoid.", @DEP_Departamento='', @USR_Usuario_Creacion='' ";
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
	public function obtener_Grupos(){
		$posts=array();
		$cont=0;
		$sql = "EXEC pa_Grupos @Accion = 'C', @GRU_Titulo = '', @GRU_Observaciones='', @GRU_Estado='',@DEP_Departamento = '' ,@USR_Usuario_Creacion='' ,@Gru_Grupo = 0";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts[$cont][0]=$row[0];
			$cont++;
		}
		return $posts;
	}
	public function ejecutar_proc_Grupo($Accion,$Titulo,$Observaciones,$Estado,$Departamento,$Grupo,$Usuario){
		$cont=0;
		$sql = "EXEC pa_Grupos @Accion = '".$Accion."', @GRU_Titulo = '".$Titulo."', @GRU_Observaciones='".$Observaciones."', @GRU_Estado='".$Estado."',@DEP_Departamento = '" .$Departamento."' ,@USR_Usuario_Creacion='".$Usuario."' ,@Gru_Grupo = ".$Grupo." ";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
}
?>	
