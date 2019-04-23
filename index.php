<?php
  require_once("global.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <!-- <link rel="shortcut icon" href="img/favicon.png">
  -->
  <title>Sistema de cotizaciones</title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo __CSS_PATH;?>bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo __CSS_PATH;?>bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo __CSS_PATH;?>elegant-icons-style.css" rel="stylesheet" />
  <link href="<?php echo __CSS_PATH;?>font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="<?php echo __CSS_PATH;?>style.css" rel="stylesheet">
  <link href="<?php echo __CSS_PATH;?>style-responsive.css" rel="stylesheet" />

</head>
<body>

  <?php
    include_once(__VWS_PATH."inicio.php");
  ?>
  
  <!-- container section end -->
  <!-- javascripts -->
  <script src="<?php echo __JS_PATH;?>jquery.js"></script>
  <script src="<?php echo __JS_PATH;?>bootstrap.min.js"></script>
  <!-- nicescroll -->
  <script src="<?php echo __JS_PATH;?>jquery.scrollTo.min.js"></script>
  <script src="<?php echo __JS_PATH;?>jquery.nicescroll.js" type="text/javascript"></script>
  <!--custome script for all page-->
  <script src="<?php echo __JS_PATH;?>scripts.js"></script>


</body>

</html>
