<?php
if(isset($_POST['Prioridad'])){
	echo "Prioridad".$_POST['Prioridad']."<br>";
}
if(isset($_POST['NombreDepartamento'])){
	echo "NombreDepartamento".$_POST['NombreDepartamento']."<br>";
}
if(isset($_POST['NombreUsuario'])){
	echo "NombreUsuario".$_POST['NombreUsuario']."<br>";
}
if(isset($_POST['NombreCliente'])){
	echo "NombreCliente".$_POST['NombreCliente']."<br>";
}
if(isset($_POST['NombreProyecto'])){
	echo "NombreProyecto".$_POST['NombreProyecto']."<br>";
}
if(isset($_POST['OrdenDeTrabajo'])){
	echo "OrdenDeTrabajo".$_POST['OrdenDeTrabajo']."<br>";
}
if(isset($_POST['NombreVendedor'])){
	echo "NombreVendedor".$_POST['NombreVendedor']."<br>";
}
if(isset($_POST['editordata'])){
	echo "editordata".$_POST['editordata']."<br>";
}
if(isset($_POST['tituloTicket'])){
	echo "tituloTicket".$_POST['tituloTicket']."<br>";
}


if(isset($_POST['tareaTareaDepartamento1'])){
	//echo $_POST['tareatareaTitulo1'];
	//echo $_POST['tareatareaDescripcion1'];
	echo $_POST['tareaTareaDepartamento1'];
	//echo $_POST['tareatareaUsuario1'];
	//echo $_POST['tareatareaHoras1'];
	//echo $_POST['tareatareaMinutos1'];
}

?>