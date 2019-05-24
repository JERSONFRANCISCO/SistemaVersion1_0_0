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
  echo $HTML->html_css_header(__CSS_PATH . "dataTables.bootstrap4.min.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "summernote.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "bootstrap-select.min.css","screen");
  echo $HTML->html_css_header(__CSS_PATH . "botonSubir.css","screen");
  ?>

</head>
<body>

  <?php
  include_once(__VWS_PATH."vw_crear_ticket.php");
  

  echo $HTML->html_js_header(__JS_PATH."jquery.js");
  echo $HTML->html_js_header(__JS_PATH."bootstrap.min.js");
  echo $HTML->html_js_header(__JS_PATH."jquery.scrollTo.min.js");
  echo $HTML->html_js_header(__JS_PATH."jquery.nicescroll.js");
  echo $HTML->html_js_header(__JS_PATH."jquery.knob.js");
  echo $HTML->html_js_header(__JS_PATH."jquery.easing.min.js");
  echo $HTML->html_js_header(__JS_PATH."jquery.dataTables.js");
  echo $HTML->html_js_header(__JS_PATH."dataTables.bootstrap4.js");
  echo $HTML->html_js_header(__JS_PATH."datatables-demo.js");
  echo $HTML->html_js_header(__CSS_PATH."summernote.js");
  echo $HTML->html_js_header(__JS_PATH."bootstrap-select.min.js");
  echo $HTML->html_js_header(__JS_PATH."scripts.js");
  echo $HTML->html_js_header(__JS_PATH."daterangepicker.js");
  echo $HTML->html_js_header(__JS_PATH."botonSubir.js");
 echo $HTML->html_js_header(__JS_PATH."crear-ticket.js");
 
  ?>

  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
        height:150
      });
    });

    $( "#NombreDepartamento" ).change(function() {
      var tareaDepartamento=document.getElementById("NombreDepartamento").value;
  //    alert( "Handler for .change() called." +tareaDepartamento);
    });

  </script>


</body>

</html>

