
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
  echo $HTML->html_css_header("https://use.fontawesome.com/releases/v5.7.0/css/all.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "style.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "style-responsive.css","screen");

  ?>

</head>
<body>

  <?php
  include_once(__VWS_PATH."vw_departamento_mantenimiento.php");
  ?>
  
  <!-- container section end -->
  <!-- javascripts -->
  <script src="<?php echo __JS_PATH;?>jquery.js" type="text/javascript"></script>


  <script src="<?php echo __JS_PATH;?>bootstrap.min.js" type="text/javascript"></script>
  <!-- nicescroll -->
  <script src="<?php echo __JS_PATH;?>jquery.scrollTo.min.js" type="text/javascript"></script>

  <script src="<?php echo __JS_PATH;?>jquery.nicescroll.js" type="text/javascript"></script>

  <!--custome script for all page-->
  <script src="<?php echo __JS_PATH;?>scripts.js"></script>


</body>

</html>
