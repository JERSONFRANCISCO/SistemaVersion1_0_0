 
<?php
require_once("global.php");
require_once(__CTR_PATH . "ctr_estandar.php");
$ctr_estandar = new ctr_estandar();

if ($_POST['key']=='cargarProyectoClientes'){
	
	$cliente = $_POST['cliente'];

	$ctr = $ctr_estandar->obtener_Proyectos_Cliente($cliente);

	echo $ctr;
}
if ($_POST['key']=='cargarOTCliente'){
	
	$cliente = $_POST['cliente'];
	$proyecto = $_POST['proyecto'];
	$ctr = $ctr_estandar->obtener_OrdenesTrabajo_Cliente($cliente,$proyecto);

	echo $ctr;
}

?>