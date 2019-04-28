<?php
class mdl_Conexion
{
	private $servidor;
	private $connectionInfo;
	private $conexion;
	private $resultado;

	function __construct()
	{
		//$this->servidor = "172.17.35.2,3341";
		$this->servidor = 'LAPTOP-PUKMO5EA\SQLEXPRESS';
		$this->connectionInfo =array("Database"=>"dialcomtickets","UID"=>"jerson","PWD"=>'Jfhj3030_',"CharacterSet"=>"UTF-8");
		$this->conectar_base_datos();

	}

	private function conectar_base_datos()
	{
		$this->conexion = sqlsrv_connect($this->servidor,$this->connectionInfo);
		return $this->conexion;
	}

	public function consulta($consulta)
	{
		$stmt = sqlsrv_query( $this->conexion, $consulta);
		return $stmt;
	}

	public function cerrar_BD ()
	{
		sqlsrv_close( $this->conexion);
	}

	public function obtener_Columnas($stmt){
		$stmt=sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC);
		return $stmt;
	}
	public function tiene_Registros($stmt){
		if ($stmt !== NULL) {  
			$rows = sqlsrv_has_rows( $stmt );  
			if ($rows === true)  {
				
				return true;
			}
			else   {
				return false; 
			}
		} 
		
	}
}
?>
