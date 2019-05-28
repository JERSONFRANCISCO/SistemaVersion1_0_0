<?php
require_once 'mdl_conexion.php';


class mdl_departamentos{

	private $conexion;

	public function __construct(){
		$this->conexion = new mdl_Conexion();	   
	} 	
	
	
}
?>	
