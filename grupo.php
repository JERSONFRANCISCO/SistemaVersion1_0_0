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
  <link rel="shortcut icon" href="<?php echo __RSC_PHO_HOST_PATH;?>favicon.png">
  
  <title>Sistema de Tickets Dialcom</title>

  <!-- Bootstrap CSS -->
  <link href="<?php echo __CSS_PATH;?>bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="<?php echo __CSS_PATH;?>bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="<?php echo __CSS_PATH;?>elegant-icons-style.css" rel="stylesheet" />
  <!-- <link href="<?php echo __CSS_PATH;?>font-awesome.min.css" rel="stylesheet" />-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <!-- Custom styles -->
  <link href="<?php echo __CSS_PATH;?>style.css" rel="stylesheet">
  <link href="<?php echo __CSS_PATH;?>style-responsive.css" rel="stylesheet" />

  <link href="<?php echo __CSS_PATH;?>dataTables.bootstrap4.min.css" rel="stylesheet">

</head>
<body>

  <?php
  include_once(__VWS_PATH."vw_grupo.php");
  ?>
  
  <!-- container section end -->
  <!-- javascripts -->
  <script src="<?php echo __JS_PATH;?>jquery.js"></script>

  <script src="<?php echo __JS_PATH;?>bootstrap.min.js"></script>


  <!-- nicescroll -->
  <script src="<?php echo __JS_PATH;?>jquery.scrollTo.min.js"></script>

  <script src="<?php echo __JS_PATH;?>jquery.nicescroll.js" type="text/javascript"></script>


  <script src="<?php echo __JS_PATH;?>scripts.js"></script>

  
  <script src="<?php echo __JS_PATH;?>bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo __JS_PATH;?>jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->


  <!-- Page level plugins -->
  <script src="<?php echo __JS_PATH;?>jquery.dataTables.js"></script>
  <script src="<?php echo __JS_PATH;?>dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo __JS_PATH;?>datatables-demo.js"></script>



</body>

</html>
