<?php
require_once("global.php");
require_once(__MDL_PATH . "mdl_html.php");

$HTML = new mdl_Html();


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">


  <?php
  echo $HTML->html_icono(__RSC_PHO_HOST_PATH);
  echo $HTML->html_TituloPagina();
  echo $HTML->html_css_header(__CSS_PATH . "bootstrap.min.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "bootstrap-theme.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "elegant-icons-style.css","screen");
  echo $HTML->html_css_header(__CSS_PATH ."font-awesome.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "style.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "style-responsive.css","screen");
  ?>



</head>
<body class="login-img3-body">

  <?php


  // cerrar session 
  if(isset($_GET['login'])){
    session_name("MYAPP"); 
    session_start();
    require_once(__CTR_PATH . "ctr_login.php");
    $ctr_login = new ctr_login();
    $ctr_login -> btn_logout_click();
  }

  // se revisan los campos de texto cuando se va a iniciar session
  if(isset($_POST['login'])){
    if(isset($_POST['TXTuser'])){
      if(isset($_POST['TXTpassword'])){
        require_once(__CTR_PATH . "ctr_login.php");
        $ctr_login = new ctr_login();
        $ctr_login -> login($_POST['TXTuser'],$_POST['TXTpassword']);
      }
    }
  }

  if(!isset($_SESSION)){
    session_name("MYAPP"); 
    session_start();
  }

  if (isset($_SESSION['MYAPP'])) {
    if ($_SESSION['MYAPP']!="YES") {
      include_once(__VWS_PATH."vw_login.php");
    }else{
     echo "<script>location.href='inicio.php';</script>";
   }
 }else{
   include_once(__VWS_PATH."vw_login.php");
 }

 ?>


</body>
</html>