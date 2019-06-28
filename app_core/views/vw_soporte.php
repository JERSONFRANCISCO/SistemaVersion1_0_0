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

    <a href="index.html" class="logo">EMPRESA CLIENTE <span class="lite"> DIALCOM TICKETS</span></a>

    <?php
    echo $HTML->actionMenu();
    ?>
  </header>
  <!--header end-->

  <!--sidebar start-->
  <?php
  echo $HTML->html_menu();
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
                  INFORMACIÓN
                </header>
                <div class="panel-body">
                  <div id="wrapper">
                    <div id="content-wrapper" class="d-flex flex-column">
                      <div id="content">
                        <div class="container-fluid" style="background-color: white;">
                          <!-- DataTales Example -->
                          <div class="card shadow mb-4">
                            <div class="card-header py-3">

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
