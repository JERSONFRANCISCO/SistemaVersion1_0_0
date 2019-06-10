<?php
class mdl_HTML {
	function __construct(){

	}
	function html_js_header($file){
		return "<script src='" . $file . "' type='text/javascript'></script>" . "\n";
	}

	function html_css_header($file,$media){
		return "<link type='text/css' href='" . $file . "' rel='stylesheet' media='" . $media . "' />" . "\n";
	}
	function html_menu(){
		$menu= "<aside>".
		"<div id='sidebar' class='nav-collapse '>".
		"<ul class='sidebar-menu'>".
		"<li class=''>".
		"<a class='' href='inicio.php'>".
		"<i class='icon_house_alt'></i>".
		"<span>Pagina Principal</span>".
		"</a>".
		"</li>".
		"<li class='sub-menu'>".
		"<a href='javascript:;' class=''>".
		"<i class='icon_table'></i>".
		"<span>Mantenimiento</span>".
		"<span class='menu-arrow arrow_carrot-right'></span>".
		"</a>".
		"<ul class='sub'>".
		"<li><a class='active' href='departamento.php'>Departamentos</a></li>".
		"<li><a class='active' href='grupo.php'>Grupos</a></li>".
		"<li><a class='active' href='usuario.php'>Usuarios</a></li>".
		"<li><a class='active' href='usuario.php'>Tareas</a></li>".
		"<li><a class='active' href='usuario.php'>Work Flow</a></li>".
		"</ul>".
		"<a href='javascript:;' class=''>".
		"<i class='icon_table'></i>".
		"<span>Tickets</span>".
		"<span class='menu-arrow arrow_carrot-right'></span>".
		"</a>".
		"<ul class='sub'>".
		"<li><a class='active' href='crear_ticket.php'>Crear ticket</a></li>".
		"<li><a class='active' href=''>Mis tickets (2)</a></li>".
		"<li><a class='active' href='tickets_abiertos.php?status=ABIERTO'>Tickets abiertos</a></li>".
		"<li><a class='active' href='tickets_abiertos.php?status=CERRADO'>Tickets cerrados</a></li>".
		"</ul>".
		"</li>".
		"</ul>".
		"</div>".
		"</aside>";
		return $menu;
	}
	function html_icono($url){
		return "<link rel='shortcut icon' href='".$url."favicon.png'>";
	}
	function html_TituloPagina(){
		return "<title>Tickets Dialcom</title>";
	}
	function html_cargandoPagina(){
		return "<div class='loader'></div>";
	}
	function boton_arriba(){
		echo "<a class='ir-arriba'  javascript:void(0) title='Volver arriba'>";
		echo "<span class='fa-stack'>";
		echo "<i class='fa fa-circle fa-stack-2x'></i>";
		echo "<i class='fa fa-arrow-up fa-stack-1x fa-inverse'></i>";
		echo "</span>";
		echo "</a>";
	}
	function actionMenu(){
		echo "<style>.tamanoimg{height: 29px; width: 25px;}</style>";
		$name= "";
		$mail="";
		$photo="";
		if(isset($_SESSION['USR_correo'])){ $mail = $_SESSION['USR_correo'];};
		if(isset($_SESSION['USR_nombre'])){ $name =  $_SESSION['USR_nombre'];};
		if(isset($_SESSION['USR_img'])){ $photo = $_SESSION['USR_img'];};
		//echo $mail;
		echo "<div class='top-nav notification-row'>".
		"<ul class='nav pull-right top-menu'>".
		"<li class='dropdown'>".
		"<a data-toggle='dropdown' class='dropdown-toggle' href='#'>".
		"<span class='profile-ava'>".
		"<img class='tamanoimg' alt='' src='".__RSC_PHO_USR_HOST_PATH.$photo."' style=''>".
		"</span>".
		"<span class='username'>$name</span>".
		"<b class='caret'></b>".
		"</a>".
		"<ul class='dropdown-menu extended logout'>".
		"<div class='log-arrow-up'></div>".
		"<li class='eborder-top'>".
		"<a href='#'><i class='icon_profile'></i> My Profile</a>".
		"</li>".
		"<li>".
		"<a href='#'><i class='icon_mail_alt'></i> My Inbox</a>".
		"</li>".
		"<li>".
		"<a href='#'><i class='icon_clock_alt'></i> Timeline</a>".
		"</li>".
		"<li>".
		"<a href='#'><i class='icon_chat_alt'></i> Chats</a>".
		"</li>".
		"<li>".
		"<a href='login.php?login=false'><i class='icon_key_alt'></i>Cerrar sesion</a>".
		"</li>".
		"<li>".
		"<a href='documentation.html'><i class='icon_key_alt'></i> Documentation</a>".
		"</li>".
		"<li>".
		"<a><i class='icon_key_alt'></i>$mail</a>".
		"</li>".
		"</ul>".
		"</li>".
		"</ul>".
		"</div>";
	}

}

?>
