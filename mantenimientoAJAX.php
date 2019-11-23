  
<?php
require_once("global.php");
require_once(__CTR_PATH . "ctr_estandar.php");
$ctr_estandar = new ctr_estandar();

if ($_POST['key']=='cargarProyectoClientes'){
	$cliente = $_POST['cliente'];
	echo $ctr_estandar->obtener_Proyectos_Cliente($cliente);
}
if ($_POST['key']=='cargarOTCliente'){
	$cliente = $_POST['cliente'];
	$proyecto = $_POST['proyecto'];
	echo $ctr_estandar->obtener_OrdenesTrabajo_Cliente($cliente,$proyecto);
}


if ($_POST['key']=='cargarTareasWF'){
	require_once(__CTR_PATH . "ctr_work_flow.php");
	$cont=0;
	$htmlTags="";
	$ctr_work_flow = new ctr_work_flow();
	$ctr = $ctr_work_flow->obtener_Tareas_nombre($_POST['NombreWFAJAX']);
	foreach ($ctr as $value) {
		if($cont % 2 == 0){
			$htmlTags.="<tr id='fila".($cont+1)."'>";
		}else{
			$htmlTags.="<tr id='fila".($cont+1)."'>";
		}
		$htmlTags.="<td> <input  id='tareaid".$value[0]."' name='tareaid".$value[0]."' type='hidden' value='".$value[0]."'>".$value[0]."</td>";
		$htmlTags.="<td> <input name='tareatareaTitulo".$value[0]."' value='".$value[1]."' type='text' style='display: none;'>".$value[1]."</td>";
		$htmlTags.="<td> <input name='tareatareaDescripcion".$value[0]."' value='".$value[2]."' type='text' style='display: none;'>".$value[2]."</td>";
		$htmlTags.="<td> <input name='tareaTareaDepartamento".$value[0]."' value='".$value[3]."' type='text' style='display: none;'>".$value[3]."</td>";
		$htmlTags.="<td> <input name='tareatareaUsuario".$value[0]."' value='".$value[4]."' type='text' style='display: none;'>".$value[4]."</td>";
		$htmlTags.="<td> <input name='tareatareaHoras".$value[0]."' value='".$value[5]."' type='text' style='display: none;'>".$value[5]."</td>";
		$htmlTags.="<td> <input name='tareatareaMinutos".$value[0]."' value='".$value[6]."' type='text' style='display: none;'>".$value[6]."</td>";
		$htmlTags.="<td>";
		$htmlTags.="<div class='btn-group'>";
		$htmlTags.="<button class='btn btn-danger' type='button' onclick='borrarFila(".($cont+1).")' title=''><i class='icon_close_alt2'></i></button>";
		$htmlTags.="</div>";
		$htmlTags.="</td>";
		$htmlTags.="</tr>";
		$cont++;
	}
	echo $htmlTags;
}
if ($_POST['key']=='actualizaEstadoPermiso'){
	echo $ctr_estandar->actualizar_Opciones_Menu($_POST['EstadoMenu'],$_POST['CodigoTarea']);
}
if ($_POST['key']=='cargarOpcionesMenu'){
	
	require_once(__CTR_PATH . "ctr_opcionesMenu.php");
	$ctr_opcionesMenu = new ctr_opcionesMenu();
	
	$grupo = $_POST['GrupoNombre'];


	$ctr = $ctr_opcionesMenu->obtener_opcionesMenu_($grupo);
	$html="";
	$html.= "<tr>";
	$html.= "<th colspan='2' ><h3>Opciones del menú</h3></th>";
	$html.= "<th><h3>Estado</h3></th>";
	$html.= "</tr>";
	$html.= "<tr>";
	$html.= "<th><h4>Opcion de menú</h4></th>";
	$html.= "<th><h4>Opcion del submenú</h4></th>";
	$html.= "<th style='text-align: center;'><i class='icon_profile'></i><h4>Acceso</h4></th>";
	$html.= "</tr>";

	$anterior="";
	foreach ($ctr as $value) {
		$html.= "<tr>";
		if($anterior != $value[0])
		{
			$html.= "<td rowspan='".$value[7]."'><h4>".$value[0]."<h4></td>";
			$anterior=$value[0];
		}
		$html.= "<td>".$value[1]."</td>";
		if($value[3]=="A"){
			$html.= "<td style='text-align: center;'><input type='checkbox' onclick='cargarOpcionesMenu(this,".$value[6].")' value='option1' checked></td>";
		}else{
			$html.= "<td style='text-align: center;'><input type='checkbox' onclick='cargarOpcionesMenu(this,".$value[6].")' value='option1'></td>";
		}
		$html.= "</tr>";
	}
	echo  $html;


	//echo "hola";
	//echo $ctr_opcionesMenu->obtener_opcionesMenu($cliente,$proyecto);
}


?>