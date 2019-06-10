<?php
require_once 'mdl_conexion.php';


class mdl_login{

	var $conexion;
	var $conn_status;


	var $USR_user;
	var $USR_nombre;
	var $USR_img;
	var $USR_correo;
	var $USR_rol;

	function __construct(){
		$this->conexion=new mdl_Conexion();
	}

	function get_USR_user(){
		return $this->USR_user;
	}
	function get_USR_nombre(){
		return $this->USR_nombre;
	}
	function get_USR_img(){
		return $this->USR_img;
	}
	function get_USR_correo(){
		return $this->USR_correo;
	}
	function get_USR_rol(){
		return $this->USR_rol;
	}


	public function login($user, $password){
		$sql = "exec pa_LoginUsuarios @Usuario = '".$user."' , @Password = '".$password."'";
		$stmt = $this->conexion->consulta($sql);

		if($this->conexion->tiene_Registros($stmt)){
			while( $row = $this->conexion->obtener_Columnas($stmt)) {
				$this->conn_status  =true;
				$this->USR_user   =$row[0];
				$this->USR_nombre =$row[1];
				$this->USR_img    =$row[2];
				$this->USR_correo =$row[3];
				$this->USR_rol    =$row[4];
			}
		}else{
			$this->conn_status=false;
		}
	}

	public function btn_logout_click(){
		unset($this->conexion);
		$this->conn_status=false;
		unset($_SESSION['MYAPP']);
	}
}

?>	
