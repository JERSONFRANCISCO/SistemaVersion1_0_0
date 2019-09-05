 
<?php

?>
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
  ?>
  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-table"></i>Manteminiento de usuarios</h3>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Departamentos
                </header>
                <div class="panel-body">
                  <form class="form-inline" role="form" method="post" action="usuario_mantenimiento.php">
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary align-self-end">Agregar</button>
                    </div>
                  </form>
                  <div id="wrapper">
                    <div id="content-wrapper" class="d-flex flex-column">
                      <div id="content">
                        <div class="container-fluid" style="background-color: white;">
                          <!-- DataTales Example -->
                          <div class="card shadow mb-4">
                            <div class="card-header py-3">

                            </div>
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                      <th>Work Flow</th>
                                      <th>Nombre</th>
                                      <th>Descripción</th>
                                      <th>Departamento</th>
                                      <th>Estado</th>
                                      <th>Acción</th>
                                    </tr>
                                  </thead>
                                  <tfoot>
                                    <tr>
                                      <th>Work Flow</th>
                                      <th>Nombre</th>
                                      <th>Descripción</th>
                                      <th>Departamento</th>
                                      <th>Estado</th>
                                      <th>Acción</th>
                                    </tr>
                                  </tfoot>
                                  <tbody>
                                    <?php
                                    require_once(__CTR_PATH . "ctr_work_flow.php");
                                    $ctr_work_flow = new ctr_work_flow();
                                    $ctr = $ctr_work_flow->obtener_Objetos();
                                    $cont = 0;
                                    foreach ($ctr as $value) {
                                      if($cont % 2 == 0){
                                        echo "<tr style = 'background: aliceblue;' >";
                                      }else{
                                        echo "<tr>";
                                      }
                                      echo "<form method='POST' action='usuario_mantenimiento.php'><td> <input  id='identificador' name='identificador' type='hidden' value='".$value[0]."'>".$value[0]."</td>";
                                      echo "<td>".$value[1]."</td>";
                                      echo "<td>".$value[2]."</td>";
                                      echo "<td>".$value[3]."</td>";
                                      echo "<td>".$value[4]."</td>";
                                      echo "<td>";
                                      echo "<div class='btn-group'>";
                                      echo "<button class='btn btn-success' id='botonEditar' name='botonEditar' type='submit' title='Editar'><i class='fas fa-edit'></i></button>";
                                      echo "<button class='btn btn-danger'  id='botonEliminar' name='botonEliminar' type='submit' title='Eliminar'><i class='icon_close_alt2'></i></button></form>";
                                      echo "</div>";
                                      echo "</td>";
                                      echo "</tr>";
                                      $cont++;
                                    }
                                    ?>
                                  </tbody>
                                </table>
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
                  <!-- End of Page Wrapper -->
                  <form class="form-inline" role="form" method="post" action="usuario_mantenimiento.php">
                    <div class="text-right">
                      <button type="submit" class="btn btn-primary align-self-end">Agregar</button>
                    </div>

                  </form>
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
