<?php
require_once 'mdl_conexion.php';


class mdl_tareas{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	
	public function obtener_Objetos(){
		$posts=array();
		$cont=0;
		$sql = "exec pa_Tareas	@Accion ='S',@DEP_DEPARTAMENTO='',@USR_Usuario='',@WRK_Titulo='',@WRK_Observaciones='',@WRK_Minutos='',@WRK_Horas='',@WRK_Estado='',@USR_Usuario_Creacion='',@WRK_DETALLE=0";
		$stmt = $this->conexion->consulta($sql);
		while( $row = $this->conexion->obtener_Columnas($stmt)) {
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

	public function insertar_tareas($Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$usr_nombre){
		$cont=0;
		$sql = "exec pa_Tareas	@Accion ='".$Accion."',@DEP_DEPARTAMENTO='".$Departamento."',@USR_Usuario='".$Usuario."',@WRK_Titulo='".$Titulo."',@WRK_Observaciones='".$Observaciones."',@WRK_Minutos='".$Minutos."',@WRK_Horas='".$Horas."',@WRK_Estado='".$Estado."',@USR_Usuario_Creacion='".$usr_nombre."',@WRK_DETALLE=0";
		$stmt = $this->conexion->consulta($sql);
		return $sql;
	}
	public function actualizar_tareas($WRK_DETALLE,$Accion,$Titulo,$Observaciones,$Departamento,$Usuario,$Minutos,$Horas,$Estado,$usr_nombre){
		$cont=0;
		$sql = "exec pa_Tareas	@Accion ='".$Accion."',@DEP_DEPARTAMENTO='".$Departamento."',@USR_Usuario='".$Usuario."',@WRK_Titulo='".$Titulo."',@WRK_Observaciones='".$Observaciones."',@WRK_Minutos='".$Minutos."',@WRK_Horas='".$Horas."',@WRK_Estado='".$Estado."',@USR_Usuario_Creacion='".$usr_nombre."',@WRK_DETALLE=".$WRK_DETALLE;
		$stmt = $this->conexion->consulta($sql);
		return $sql;

	}
	public function eliminar_tareas($Accion){
		$posts="";
		return $posts;
	}
}

?>	
