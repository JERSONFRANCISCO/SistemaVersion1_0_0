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
  echo $HTML->html_css_header(__CSS_PATH . "bootstrap-select.min.css","screen");


  echo $HTML->html_css_header(__CSS_PATH . "dataTables.bootstrap4.min.css","screen");
  ?>
</head>
<body>

  <?php
  if(!isset($_SESSION)){
    session_name("MYAPP"); 
    session_start();
  }

  if (isset($_SESSION['MYAPP'])){ 
    include_once(__VWS_PATH."vw_work_flow_mantenimiento.php");
  } else{
    include_once("login.php");
  }
  echo $HTML->html_js_header(__JS_PATH."jquery.js");
  echo $HTML->html_js_header(__JS_PATH."bootstrap.min.js");
  echo $HTML->html_js_header(__JS_PATH."jquery.scrollTo.min.js");
  echo $HTML->html_js_header(__JS_PATH."jquery.nicescroll.js");
  echo $HTML->html_js_header(__JS_PATH."scripts.js");
  echo $HTML->html_js_header(__JS_PATH."bootstrap-select.min.js");
  echo $HTML->html_js_header(__JS_PATH."comunes.js");

    //echo $HTML->html_js_header(__JS_PATH."crear-ticket.js");

  echo $HTML->html_js_header(__JS_PATH."jquery.dataTables.js");
  echo $HTML->html_js_header(__JS_PATH."dataTables.bootstrap4.js");
  echo $HTML->html_js_header(__JS_PATH."DataTableINI.js");
  ?>
  

  <script type="text/javascript">

    $(document).ready(function(){
      $('button[id=subeTarea]').click(function() {
        var valor0 = $(this).parents("tr").find("td").eq(0).text();
        var valores="<tr id='fila"+valor0.trim()+"'>";
        $(this).parents("tr").find("td").each(function(){
          var dato=$(this).html();
          if(dato.substring(0, 4) == "<div"){
            valores+= "<td>";
            valores+= "<div class='btn-group'>";
            valores+= "<button class='btn btn-danger'  type='button'  onclick='borrarFila("+valor0+")' title='Agregar'><i class='icon_close_alt2'></i></button>";
            valores+= "</div>";
            valores+= "</td>";
          }else{
            valores += "<td>"+dato+"</td>";
          }
        });
        valores+="</tr>";
        $('#taskwf tbody').append(valores);
      });
    });

    function borrarFila(id){
     $("#fila"+id).remove();
   }


 </script>

</body>

</html>
