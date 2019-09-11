<?php


if (isset($_GET['status'])) {
  if($_GET['status'] != 'ABIERTO' and  $_GET['status'] != 'CERRADO'){
    header('Location: index.php');
  }
}
?>

<style type="text/css">
  .drag-drop-item
  {
    touch-action: none;
  }
</style>  

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
          <h3 class="page-header"><i class="fa fa-table"></i>Tickets <?php echo $_GET['status'];?>S</h3>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  TICKETS
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
                            <div class="card-body">
                              <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                  <thead>
                                    <tr>
                                     <th>Ticket</th>
                                     <th>Fec. Creación</th>
                                     <th>Título</th>
                                     <th>Departamento</th>
                                     <th>Usuario</th>
                                     <th>Estado</th>
                                     <th>% Completado</th>
                                     <th>Fec. Vencimiento</th>
                                   </tr>
                                 </thead>
                                 <tfoot>
                                  <tr>
                                    <th>Ticket</th>
                                    <th>Fec. Creación</th>
                                    <th>Título</th>
                                    <th>Departamento</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                    <th>% Completado</th>
                                    <th>Fec. Vencimiento</th>
                                  </tr>                                  
                                </tfoot>
                                <tbody>
                                  <?php
                                  require_once(__CTR_PATH . "ctr_ticket.php");
                                  $ctr_ticket = new ctr_ticket();
                                  
                                  if(isset($_GET['ini']) and isset($_GET['cant'])){
                                    $inicio=$_GET['ini'];
                                    $cantidad=$_GET['cant'];
                                  }else{
                                    $inicio = 0;
                                    $cantidad=15;
                                  }
                                  $ctr = $ctr_ticket->obtener_Tickets(substr($_GET['status'], 0,1),$_SESSION['USR_user'],$inicio,$cantidad);
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    if($cont % 2 == 0){
                                      echo "<tr style = 'background: aliceblue;' >";
                                    }else{
                                      echo "<tr>";
                                    }
                                    echo "<td> <a href='hilo_ticket?ticket=".$value[0]."' >".$value[0]."</td>";
                                    echo "<td> ".$value[1]."</a> </td>";
                                    echo "<td> <a href='hilo_ticket?ticket=".$value[0]."' >".$value[2]."</a> </td>";
                                    echo "<td> ".$value[3]."</td>";
                                    echo "<td> ".$value[4]."</td>";
                                    echo "<td> ".$value[5]."</td>";
                                    echo "<td> ".$value[6]."</td>";
                                    echo "<td> ".$value[7]."</td>";
                                    echo "</tr>";
                                    $cont++;
                                  }
                                  ?>
                                </tbody>
                              </table>
                            </div>

                          </div>
                        </div>

                        <div class="text-center">
                          <ul class="pagination">


                           <li><a href="tickets_abiertos_2.php?status=ABIERTO">«</a></li>
                           <?php
                           require_once(__CTR_PATH . "ctr_ticket.php");
                           $ctr_ticket = new ctr_ticket();
                           $ctr = $ctr_ticket->obtener_Tickets_cantidad(substr($_GET['status'], 0,1),$_SESSION['USR_user']);

                           if(isset($_GET['btn'])){
                            $activo=$_GET['btn'];
                          }else{
                            $activo="";
                          }

                          for($i = 0 ; $i < $ctr[0][0] ; $i++){
                            if($i <= 7 ){
                              if(($i+1)==$activo){
                                echo "<li class='active'><a href='tickets_abiertos_2.php?status=ABIERTO&ini=".($i*20)."&cant=20&btn=".($i+1)."'>".($i+1)."</a></li>";
                              }else{
                                echo "<li><a href='tickets_abiertos_2.php?status=ABIERTO&ini=".($i*15)."&cant=20&btn=".($i+1)."'>".($i+1)."</a></li>";
                              }
                            }else{
                              $i=$ctr[0][0];
                            }
                          }

                          ?>
                          <li><a href="tickets_abiertos_2.php?status=ABIERTO">»</a></li>  

                        </ul>
                      </div>


                    </div>
                    <!-- /.container-fluid -->
                  </div>
                  <!-- End of Main Content -->
                </div>
                <!-- End of Content Wrapper -->
              </div>
              <!-- End of Page Wrapper -->
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
