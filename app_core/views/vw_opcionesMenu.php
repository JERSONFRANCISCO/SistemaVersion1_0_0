<?php

?>
<style type="text/css">
  .drag-drop-item
  {
    touch-action: none;
  }
</style>  
<?php

?>

<style type="text/css">

  .drag-drop-item
  {
    touch-action: none;
  }
</style>
<script>

</script>
<!-- container section start -->
<section id="container" class="">
  <!--header start-->
  <header class="header dark-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    
    <?php
    echo $HTML->actionMenu();

    ?>
  </header>
  <!--header end-->

  <!--sidebar start-->
  <?php
  echo $HTML->html_menu();
  echo $HTML->boton_arriba();

  ?>


  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-table"></i>AYUDA Y SOPORTE TÉCNICO</h3>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Envía un mensaje al desarrollador!
                </header>
                <div class="panel-body">
                  <div id="wrapper">
                    <div id="content-wrapper" class="d-flex flex-column">
                      <div id="content">
                        <div class="container-fluid" style="background-color: white;">
                          <!-- DataTales Example -->
                          <div class="card shadow mb-4">
                            <div class="card-header py-3">
                             <div class="row">
                              <div class="col-lg-12">
                                <section class="panel">
                                  <header class="panel-heading">
                                    Selecione un grupo
                                  </header>
                                  <br>
                                  <div class="form-group">
                                    <label class="control-label col-lg-2" for="inputSuccess"><h4>Grupo</h4></label>
                                    <div class="col-lg-10">
                                      <select class="form-control m-bot15 selectpicker" id="Grupo"  name="Grupo" name="Grupo" data-live-search="true" title="Selecione Grupo" <?php echo $comboBOX;?>>
                                        <?php
                                        require_once(__CTR_PATH . "ctr_grupo.php");
                                        $ctr_grupo = new ctr_grupo();
                                        $ctr = $ctr_grupo->obtener_Grupos();
                                        echo $HTML->SelectedCombo($ctr,"");
                                        ?>
                                      </select>
                                    </div>
                                  </div>
                                  <table class="table table-striped table-advance table-hover table-bordered">
                                    <tbody>
                                      <tr >
                                        <th colspan="2" ><h3>Opciones del menú</h3></th>
                                        <th><h3>Estado</h3></th>
                                      </tr>
                                      <tr>
                                        <th><h4>Opcion de menú</h4></th>
                                        <th><h4>Opcion del submenú</h4></th>
                                        <th style='text-align: center;'><i class="icon_profile"></i><h4>Acceso</h4></th>
                                      </tr>


                                      <?php
                                      require_once(__CTR_PATH . "ctr_opcionesMenu.php");
                                      $ctr_opcionesMenu = new ctr_opcionesMenu();
                                      $ctr = $ctr_opcionesMenu->obtener_opcionesMenu();

                                      $html="";
                                      $anterior="";
                                      foreach ($ctr as $value) {
                                        $html.= "<tr>";
                                        if($anterior != $value[0])
                                        {
                                         $html.= "<td rowspan='".$value[7]."'><h4>".$value[0]."<h4></td>";
                                         $anterior=$value[0];
                                       }
                                       $html.= "<td>".$value[1]."</td>";
                                       if($value[3]=="A"){
                                         $html.= "<td style='text-align: center;'><input type='checkbox' onclick='cargarOpcionesMenu(this,".$value[6].")' value='option1' checked></td>";
                                       }else{
                                        $html.= "<td style='text-align: center;'><input type='checkbox' onclick='cargarOpcionesMenu(this,".$value[6].")' value='option1'></td>";
                                       }
                                       $html.= "</tr>";
                                     }
                                     echo  $html;
                                     ?>

                                   </tbody>
                                 </table>
                               </section>
                             </div>


                           </div>
                         </div>

                       </div>
                     </div>
                     <!-- /.container-fluid -->
                   </div>
                   <!-- End of Main Content -->
                 </div>
                 <!-- End of Content Wrapper -->
               </div>

             </div>

           </section>
         </div>
       </div>
     </div>
   </div>



 </section>
</section>


<?php
echo $HTML->html_footer();
?>


</section>
