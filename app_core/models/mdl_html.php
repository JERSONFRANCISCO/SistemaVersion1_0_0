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
		"<a class='' href='index.php'>".
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

}

?>
