<?php

if(isset($_POST['editordata'])){
  require_once(__CTR_PATH . "ctr_ticket.php");
  $ctr_ticket = new ctr_ticket();
  $ctr = $ctr_ticket->insertar_hilo_ticket($_GET['ticket'],$_POST['editordata'],$_SESSION['USR_user']);
  $_POST['editordata']="";
}

?>

<style type="text/css">
  .drag-drop-item
  {
    touch-action: none;
  }
  i{
    background-color: rgba(255, 255, 255, 0)!important;
  }
  #alinearIzquierda{
    text-align: left;
  }
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo __IMG_PATH; ?>page-loader.gif') 50% 50% no-repeat rgb(249,249,249);
    opacity: 1;
  }
</style>  

<div class="loader"></div>

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
          <!-- <h3 class="page-header"><i class="fa fa-table"></i>Ticket 0001</h3> -->
          <div class="row">
            <div class="col-lg-12">
              <header class="panel-heading">
                <div class="row">
                  <div class="col-lg-4">
                    Ticket 
                    <?php 
                    if(isset($_GET['ticket'])){ 
                      echo $_GET['ticket'] ;} 
                      ?>
                    </div>
                  <!--
                    
                  <div class="col-lg-8">
                    <div class="progress progress-striped progress-sm">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </div>
                -->
              </div>  
            </header>

            <div class="row">
              <!-- profile-widget -->
              <div class="col-lg-12">
                <div class="panel-body" style="color: black;background-color: white;">
                  <div class="row">
                    <div class="row">
                      <!-- profile-widget -->
                      <div class="col-lg-12">


                        <?php 

                        if(isset($_GET['ticket'])){
                         require_once(__CTR_PATH . "ctr_ticket.php");
                         $ctr_ticket = new ctr_ticket();
                         $ctr = $ctr_ticket->pa_informacion_ticket($_GET['ticket']);
                         foreach ($ctr as $value) {
                          echo"<div class='bio-row'>".
                          "<p><span>Estado</span> $value[0]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Creado por</span> $value[6]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Prioridad</span> $value[1]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Usuario asignado</span> $value[5]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Departamento</span> $value[4]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Vendedor</span> $value[8]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span><i class='icon_calendar'></i> Creado el</span> $value[2]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Cliente</span> $value[9]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span><i class='icon_calendar'></i> Vence el</span> $value[3]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Proyecto</span> $value[10]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Titulo</span> $value[7]</p>".
                          "</div>".
                          "<div class='bio-row'>".
                          "<p><span>Orden de trabajo</span> $value[11]</p>".
                          "</div>";
                        }
                      }else{
                        echo "no";
                      } 
                      ?>

                    </div>
                  </div>

                  <br>

                  <!-- AQUI INICIA LAS CEJILLAS DONDE SE ECUENTRA PARA RESPONDER UN TICKET CAMBIAR DEPARTAMENTO CAMBIAR USUARIO-->
                  <div class="row">
                    <div class="col-lg-12">
                      <section class="panel">
                        <header class="panel-heading tab-bg-info">
                          <ul class="nav nav-tabs">
                            <li class="active">
                              <a data-toggle="tab" href="#contestar">
                                Responder
                              </a>
                            </li>
                            <li>
                              <a data-toggle="tab" href="#changeDepartamento">
                                Cambiar Departamento
                              </a>
                            </li>
                            <li>
                              <a data-toggle="tab" href="#changeUser">
                                Asignar Usuario
                              </a>
                            </li>
                          </ul>
                        </header>

                        <div class="panel-body">
                          <div class="tab-content">
                            <!-- AQUI INICIA LA CEJILLA QUE CONTIENE EL FORMULARIO DONDE SE LLENA LA INFORMACIÓN 
                              AQUI SE EJECUTA EL EVENTO QUE REFRESCA LA PAGINA PARA GUARDAR LOS DATOS EN LA BD Y REFRESCAR NUEVAMENTE-->
                              <div id="contestar" class="tab-pane active">
                                <div class="row">
                                  <div  class="col-lg-12">
                                    <form method="post" action="" >
                                      <textarea id="summernote" name="editordata" ></textarea>
                                      <button type="submit" class="btn btn-primary btn-lg btn-block">Responder</button>
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <!-- AQUI TERMINA LA CEJILLA QUE CONTIENE EL FORMULARIO DONDE SE LLENA LA INFORMACIÓN -->

                              <!-- AQUI INICIA LA CEJILLA QUE CONTIENE EL CAMBIA EL DEPARTAMENTO -->
                              <div id="changeDepartamento" class="tab-pane">

                              </div>
                              <!-- AQUI TERMINA LA CEJILLA QUE CONTIENE EL CAMBIA EL DEPARTAMENTO -->
                              <!-- AQUI INICIA LA CEJILLA QUE CONTIENE EL CAMBIA EL USUARIO -->
                              <div id="changeUser" class="tab-pane">

                              </div>
                              <!-- AQUI INICIA LA CEJILLA QUE CONTIENE EL CAMBIA EL USUARIO -->
                            </div>
                          </div>

                        </section>
                      </div>
                    </div>
                    <!-- AQUI TERMINA LAS CEJILLAS DONDE SE ECUENTRA PARA RESPONDER UN TICKET CAMBIAR DEPARTAMENTO CAMBIAR USUARIO-->

                    <!-- AQUI INICIA LAS CEJILLAS DONDE SE ECUENTRA EL HILO DEL TICKET Y EL -->
                    <div class="row">
                      <div class="col-lg-12">
                        <section class="panel">
                          <header class="panel-heading tab-bg-info">
                            <ul class="nav nav-tabs">
                              <li class="active">
                                <a data-toggle="tab" href="#recent-activity">
                                  Detalles del ticket
                                </a>
                              </li>
                              <li>
                                <a data-toggle="tab" href="#task">
                                  Tareas
                                </a>
                              </li>
                            </ul>
                          </header>
                          <br>
                          <div class="panel-body">
                            <div class="tab-content">
                              <div id="recent-activity" class="tab-pane active">
                                <div class="profile-activity">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_ticket.php");
                                  $ctr_ticket = new ctr_ticket();
                                  $ctr = $ctr_ticket->obtener_hilo_ticket($_GET['ticket']);
                                  foreach ($ctr as $value) {

                                    echo "<div class='act-time'>";
                                    echo "<div class='activity-body act-in'>";
                                    echo "<span class='arrow'></span>";
                                    $borde = "";
                                    if($value[4]=="A"){
                                      $borde = "background-color: #dedede2b;";
                                    }else{
                                      if($value[4]=="J"){
                                        $borde = "background-color: #f0f8ff87;";
                                      }else{
                                        $borde = "";
                                      }
                                    }
                                    echo "<div class='text' style=' border: 1px solid #394a5994; ".$borde."'>";
                                    echo "<p class='attribution'><a style='color:  #394a5994;' class='col-lg-4'>Publicado por: ".$value[0]."</a><span><a><i class='icon_calendar' class='col-lg-4'></i></span> ".$value[3]."</a><a class='col-lg-4'>".$value[1]."</a></p> " ;
                                    echo "<p><div style='background-color:white; border: 1px solid #6264654d;'>".$value[2]."</div></p>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</div>";
                                  }
                                  ?>
                                </div>
                              </div>
                              <!-- profile -->
                              <div id="task" class="tab-pane">
                                <div class="row">
                                  <section class="panel">
                                    <header class="panel-heading">
                                      Estado de tareas
                                    </header>
                                    <div class="table-responsive">
                                      <table class="table">
                                        <thead>
                                          <tr>
                                            <th>Titulo</th>
                                            <th>Descripción</th>
                                            <th>Usuario</th>
                                            <th>Horas</th>
                                            <th>Minutos</th>
                                            <th>Estado</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                          require_once(__CTR_PATH . "ctr_ticket.php");
                                          $ctr_ticket = new ctr_ticket();
                                          $ctr = $ctr_ticket->obtener_tarea_ticket($_GET['ticket']);
                                          foreach ($ctr as $value) {
                                            echo "<tr>".
                                            "<td>$value[1]</td>".
                                            "<td>$value[2]</td>".
                                            "<td>$value[5]</td>".
                                            "<td>$value[4]</td>".
                                            "<td>$value[3]</td>";
                                            if($value[6] == 'A'){
                                              echo "<td><input type='checkbox' data-toggle='toggle' data-on='Realizado' data-off='Por hacer'></td>";
                                            }else{
                                              echo "<td><input type='checkbox' checked data-toggle='toggle' data-on='Realizado' data-off='Por hacer'></td>";
                                            }
                                            echo "</tr>";
                                          }
                                          ?>
                                        </tbody>
                                      </table>
                                    </div>
                                  </section>
                                </div>
                              </div>
                            </div>
                          </div>


                        </section>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </section>

        </section>


  <?php
  echo $HTML->html_footer();
  ?>
