<?php
class mdl_HTML {
	function __construct(){}
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
		"<a class='' href='index.html'>".
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
		"<li><a class='active' href='index.php'>Departamentos</a></li>".
		"<li><a class='active' href='grupo.php'>Grupos</a></li>".
		"<li><a class='active' href='usuario.php'>Usuarios</a></li>".
		"</ul>".
		"<a href='javascript:;' class=''>".
		"<i class='icon_table'></i>".
		"<span>Tickets</span>".
		"<span class='menu-arrow arrow_carrot-right'></span>".
		"</a>".
		"<ul class='sub'>".
		"<li><a class='active' href='crear_ticket.php'>Crear ticket</a></li>".
		"<li><a class='active' href='hilo_ticket.php'>Mis tickets (2)</a></li>".
		"<li><a class='active' href='hilo_ticket.php'>Tickets abiertos</a></li>".
		"<li><a class='active' href='hilo_ticket.php'>Tickets cerrados</a></li>".
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
}

?>
