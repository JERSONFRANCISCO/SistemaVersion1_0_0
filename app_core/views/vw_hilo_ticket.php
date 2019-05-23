<?php
if(isset($_POST['editordata'])){
  require_once(__CTR_PATH . "ctr_hilo_Ticket.php");
  $ctr_hilo_Ticket = new ctr_hilo_Ticket();
  $ctr = $ctr_hilo_Ticket->insertar_hilo_ticket('',$_POST['editordata'],'','');
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
                    Ticket 001 
                  </div>
                  <div class="col-lg-8">
                    <div class="progress progress-striped progress-sm">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </div>
                </div>  
              </header>

              <div class="row">
                <!-- profile-widget -->
                <div class="col-lg-12">
                  <div class="profile-widget profile-widget-info">
                    <div class="panel-body" style="color: black;background-color: white;">

                     <div class="col-lg-2 col-sm-2 follow-info">
                      <p><strong>Estado:</strong></p>
                      <p><strong>Prioridad:</strong></p>
                      <p><strong><span><i class="icon_calendar"></i> Creado el:</span></strong></p>
                      <p><strong><span><i class="icon_calendar"></i> Creado el:</span></strong></p>
                    </div>
                    <div class="col-lg-2 col-sm-2 follow-info">
                      <p>Activo</p>
                      <p>Normal</p>
                      <p>18/05/2019</p>
                      <p>12/05/2019</p>
                    </div>

                    <div class="col-lg-2 col-sm-2 follow-info">
                      <p><strong>Vendedor:</strong></p>
                      <p><strong>Cliente:</strong></p>
                      <p><strong>Proyecto:</strong></p>
                      <p><strong>Orden de trabajo:</strong></p>
                    </div>
                    <div class="col-lg-2 col-sm-2 follow-info">
                      <p>Jerson Hidalgo</p>
                      <p>Jerson Jimenez</p>
                      <p>Francisco Hidalgo</p>
                      <p>001</p>
                    </div>

                    <div class="col-lg-2 col-sm-2 follow-info">
                      <p><strong>Departamento:</strong></p>
                      <p><strong>Usuario creación:</strong></p>
                      <p><strong>Usuario asignado:</strong></p>
                      <p><strong>Titulo:</strong></p>
                    </div>
                    <div class="col-lg-2 col-sm-2 follow-info">
                      <p>Informática</p>
                      <p>Jerson Jimenez</p>
                      <p>Francisco Hidalgo</p>
                      <p>Ajuste en el sistema operativo</p>
                    </div>

                  </div>
                </div>
              </div>
            </div>


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
                          <div class="profile-activity">
                            <form method="post" action="" >
                              <textarea id="summernote" name="editordata" ></textarea>
                              <button type="submit" class="btn btn-primary btn-lg btn-block">Responder</button>
                            </form>
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

                    <div class="panel-body">
                      <div class="tab-content">
                        <div id="recent-activity" class="tab-pane active">
                          <div class="profile-activity">
                            <?php
                            require_once(__CTR_PATH . "ctr_hilo_Ticket.php");
                            $ctr_hilo_Ticket = new ctr_hilo_Ticket();
                            $ctr = $ctr_hilo_Ticket->obtener_Objetos();
                            foreach ($ctr as $value) {
                              echo "<div class='act-time'>";
                              echo "<div class='activity-body act-in'>";
                              echo "<span class='arrow'></span>";
                              echo "<div class='text' style='border: 1px solid #1a2732;'>";
                              echo "<p class='attribution'><a style='color: #797979;'>Publicado por: ".$value[0]."</a><span><i class='icon_calendar'></i></span> FECHA ".$value[3]."</p>";
                              echo "<hr style='margin-top: 0px; border: 0.5px solid #1a2732;' ><p>".$value[2]."</p>";
                              echo "</div>";
                              echo "</div>";
                              echo "</div>";
                            }
                            ?>
                          </div>
                        </div>
                        <!-- profile -->
                        <div id="task" class="tab-pane">
                          <section class="panel">
                          </section>
                          <section>
                            <div class="row">
                            </div>
                          </section>
                        </div>
                      </div>
                    </div>


                  </section>
                </div>
              </div>
              <!--  termina la parte del hilo y tareas del ticket-->



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
