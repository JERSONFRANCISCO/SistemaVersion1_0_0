<?php
class mdl_HTML {
	private $postdata;
	function __construct(){

	}

	function html_footer(){
		echo"<div class='modal fade' id='modalPreguntaSalirSession' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'".
		"aria-hidden='true'>".
		"<div class='modal-dialog'>".
		"<div class='modal-content'>".
		"<div class='modal-header'>".
		"<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>".
		"<h4 class='modal-title'><strong>¿Deseas cerrar la sesión?</strong></h4>".
		"</div>".
		"<div class='modal-body'><strong>Salir</strong> para cerrar sesión <br> <strong>Cancelar</strong> para permanecer en la página</div>".
		"<div class='modal-footer'>".
		"<button data-dismiss='modal' class='btn btn-default' type='button'>Cancelar</button>".
		"<a class='btn btn-primary' href='login.php?login=false'>Salir</a>".
		"</div>".
		"</div>".
		"</div>".
		"</div>";

		$html ="<div class='text-center'>".
		"<div class='credits'>".
		"Diseñado por <a href='http://dialcomcr.com/' target='_blank'>DIALCOM</a>".
		"</div>".
		"</div>";
		return $html;
	}

	function html_js_header($file){
		return "<script src='" . $file . "' type='text/javascript'></script>" . "\n";
	}

	function html_css_header($file,$media){
		return "<link type='text/css' href='" . $file . "' rel='stylesheet' media='" . $media . "' />" . "\n";
	}
	function html_menu(){

		require_once(__MDL_PATH . "mdl_inicio.php");
		$this->postdata = new mdl_inicio();
		$var = $this->postdata->obtener_Menu_Rol($_SESSION['USR_rol']);
		$padre = array();
		$cont=0;
		foreach ($var as $value) { $padre[$cont]= $value[0]; $cont++;	}
		$padre=array_unique($padre);

		$menu= "<aside>".
		"<div id='sidebar' class='nav-collapse '>".
		"<ul class='sidebar-menu'>".
		"<li class=''>".
		"<a class='' href='inicio.php'>".
		"<i class='icon_house_alt'></i>".
		"<span>Pagina Principal</span>".
		"</a>".
		"</li>".
		"<li class='sub-menu'>";
		foreach ($padre as $menuARRAY){
			$menu.="<a href='javascript:;' class=''>".
			"<i class='icon_table'></i>".
			"<span>".$menuARRAY."</span>".
			"<span class='menu-arrow arrow_carrot-right'></span>".
			"</a>";
			$menu.="<ul class='sub'>";
			foreach ($var as $submenu) {
				if($submenu[0]==$menuARRAY){
					$menu.="<li><a class='active' href='".$submenu[2]."'>".$submenu[1]."</a></li>";
				}
			}
			$menu.="</ul>";
		}
		$menu.="</li>".
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
		echo "<a href='index.php' class='logo'>DIALCOM<span class='lite'>TICKETS</span></a><style>.tamanoimg{height: 29px; width: 25px;}</style>";
		$name= "";
		$mail="";
		$photo="";
		if(isset($_SESSION['USR_correo'])){ $mail = $_SESSION['USR_correo'];};
		if(isset($_SESSION['USR_nombre'])){ $name =  $_SESSION['USR_nombre'];};
		if(isset($_SESSION['USR_img'])){ $photo = $_SESSION['USR_img'];};

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
		"<a data-toggle='modal' href='#modalPreguntaSalirSession'><i class='icon_key_alt'></i>Cerrar sesion</a>".
		"</li>".
		"<li>".
		"<a><i class='icon_key_alt'></i>$mail</a>".
		"</li>".
		"</ul>".
		"</li>".
		"</ul>".
		"</div>";
	}

	function Mensaje($string,$tipo){
		return "<div style='position: absolute; z-index: 1; left: 10%; width: 80%;' class='alert alert-$tipo alert-dismissible fade in' role='alert'>".
		"<button type='button' class='close' data-dismiss='alert' aria-label='Close'>".
		" <span aria-hidden='true'>&times;</span>".
		" </button>".
		$string.
		"</div>";
		// tipos : primary-secondary-success-danger-warning-info-light-dark
	}
	function SelectedCombo($data,$valor){
		$salida="";
		foreach ($data as $value) {
			if($value[0]==$valor){
				$salida.="<option selected>".$value[0]."</option>";  
			}else{
				$salida.="<option>".$value[0]."</option>";  
			}
		}
		return $salida;
	}
}

?>
