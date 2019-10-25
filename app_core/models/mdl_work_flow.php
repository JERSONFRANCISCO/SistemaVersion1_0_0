<?php
require_once 'mdl_conexion.php';

class mdl_work_flow{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	
	public function obtener_Objetos(){
		$posts=array();
		$cont=0;
		$sql = "exec pa_WorkFlow @accion='SELECT' ,@WRK_WORK_FLOW=0 , @DEP_titulo='',@USR_Usuario_Creacion='',@WRK_Titulo='',@WRK_Observaciones='',@WRK_Estado='' ,@WRK_DETALLE=0";
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
	public function obtener_Tareas_nombre($Accion,$WRK_WORK_FLOW){
		$posts=array();
		$cont=0;
		$sql = "exec pa_WorkFlow @accion='".$Accion."' ,@WRK_WORK_FLOW=0  ,@DEP_titulo='',@USR_Usuario_Creacion='',@WRK_Titulo='".$WRK_WORK_FLOW."',@WRK_Observaciones='',@WRK_Estado='',@WRK_DETALLE=0";
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
	public function obtener_Tareas($Accion,$WRK_WORK_FLOW){
		$posts=array();
		$cont=0;
		$sql = "exec pa_WorkFlow @accion='".$Accion."' ,@WRK_WORK_FLOW=".$WRK_WORK_FLOW." ,@DEP_titulo='',@USR_Usuario_Creacion='',@WRK_Titulo='',@WRK_Observaciones='',@WRK_Estado='',@WRK_DETALLE=0";
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
	public function ejecutar_proc_workflow($Accion,$WRK_WORK_FLOW,$WRK_Titulo,$WRK_Observaciones,$WRK_Estado,$DEP_titulo,$WRK_DETALLE,$USR_Usuario_Creacion){
		$cont=0;
		$sql = "exec pa_WorkFlow @accion='".$Accion."',@WRK_WORK_FLOW=".$WRK_WORK_FLOW." ,@WRK_Titulo='".$WRK_Titulo."',@WRK_Observaciones='".$WRK_Observaciones."',@WRK_Estado='".$WRK_Estado."',@DEP_titulo='".$DEP_titulo."',@USR_Usuario_Creacion='".$USR_Usuario_Creacion."',@WRK_DETALLE=".$WRK_DETALLE;
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
	public function pa_WorkFlow_ultimo_ingreso(){
		$posts=array();
		$sql = "exec pa_WorkFlow_ultimo_ingreso";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
			$posts=$row[0];
		}
		return $posts;
	}
}
?>	
