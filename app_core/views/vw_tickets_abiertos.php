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

    <a href="index.html" class="logo">EMPRESA CLIENTE <span class="lite"> DIALCOM TICKETS</span></a>

    <div class="top-nav notification-row">
      <ul class="nav pull-right top-menu">
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="profile-ava">
              <img alt="" src="app_design/img/cc.jpg">
            </span>
            <span class="username">Jenifer Smith</span>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu extended logout">
            <div class="log-arrow-up"></div>
            <li class="eborder-top">
              <a href="#"><i class="icon_profile"></i> My Profile</a>
            </li>
            <li>
              <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
            </li>
            <li>
              <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
            </li>
            <li>
              <a href="#"><i class="icon_chat_alt"></i> Chats</a>
            </li>
            <li>
              <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
            </li>
            <li>
              <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
            </li>
            <li>
              <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
            </li>
          </ul>
        </li>
        <!-- user login dropdown end -->
      </ul>
      <!-- notificatoin dropdown end-->
    </div>
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
                                  $ctr = $ctr_ticket->obtener_Tickets(substr($_GET['status'], 0,1));
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


<!--main content end-->
<div class="text-center">
  <div class="credits">
    Diseñado por <a href="http://dialcomcr.com/">DIALCOM</a>
  </div>
</div>
</section>
