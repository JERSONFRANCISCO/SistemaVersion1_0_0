<?php
if(isset($_POST['editordata'])){

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

  #labelsDerecha{
    text-align: left;
  }
</style> 
<script type="text/javascript">
  function mi_alerta () {
    alert ("Este seria el mensaje de alerta desde boton!");
  } 
</script>


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
                  <!--
                  <div class="col-lg-8">
                    <div class="progress progress-striped progress-sm">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                        <span class="sr-only">20% Complete</span>
                      </div>
                    </div>
                  </div>  -->
                </div>  
              </header>
              <form class="form-horizontal " method="POST" action="guardar.php">
                <div class="row">
                  <!-- profile-widget -->
                  <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                      <div class="panel-body" style="color: black;background-color: white;">

                        <div row>
                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <label class="control-label col-lg-4" id="labelsDerecha" for="inputSuccess">Prioridad:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Prioridad" name="Prioridad" data-live-search="true" title="Selecione la prioridad">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_Catalogo("Prioridades");
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Departamento:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreDepartamento" name="NombreDepartamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Usuario asignado:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Fecha de vencimiento:</label>
                              <div class="col-sm-8">
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    <div class="input-append date" id="dpYears" data-date="18-06-2013" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                      <input class="form-control" size="16" type="text" value="28-06-2013" readonly>
                                      <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                  </div>
                                </div>
                              </div>

                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Cliente:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Proyecto:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Orden de trabajo:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Vendedor:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="labelsDerecha">Flujo de trabajo:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              

                            </div>
                          </div>
                          <div class="row">
                            <!-- profile-widget -->
                            <div class="col-lg-12">
                              <label class="control-label col-lg-1" for="inputSuccess">Título:</label>

                              <div class="col-sm-11">
                                <input class="form-control" placeholder="" type="text">
                              </div>
                            </div>
                            <br>
                          </div>

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
                            <a data-toggle="tab" href="#detallesTicket">
                              Detalle del ticket
                            </a>
                          </li>
                          <li>
                            <a data-toggle="tab" href="#changeTareas">
                              Tareas
                            </a>
                          </li>
                        </ul>
                      </header>

                      <div class="panel-body">
                        <div class="tab-content">
                      <!-- AQUI INICIA LA CEJILLA QUE CONTIENE EL FORMULARIO DONDE SE LLENA LA INFORMACIÓN 
                        AQUI SE EJECUTA EL EVENTO QUE REFRESCA LA PAGINA PARA GUARDAR LOS DATOS EN LA BD Y REFRESCAR NUEVAMENTE-->
                        <div id="detallesTicket" class="tab-pane active">
                          <div class="profile-activity">
                            <form method="post" action="" >
                              <textarea id="summernote" name="editordata" ></textarea>
                            </form>
                          </div>
                        </div>
                        <!-- AQUI TERMINA LA CEJILLA QUE CONTIENE EL FORMULARIO DONDE SE LLENA LA INFORMACIÓN -->

                        <!-- AQUI INICIA LA CEJILLA QUE CONTIENE EL  -->
                        <div id="changeTareas" class="tab-pane">
                          <div class="row" 
                          >
                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <div class="col-lg-12">
                                <label class="control-label col-lg-2" >Título:</label>
                                <div class="col-sm-11">
                                  <input class="form-control" placeholder="" type="text">
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <label class="control-label col-lg-2" for="inputSuccess">Descripción:</label>
                                <div class="col-sm-11">
                                  <input class="form-control" placeholder="" type="text">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <label class="control-label col-lg-2" for="inputSuccess">Horas:</label>
                                <div class="col-sm-11">
                                  <input class="form-control" placeholder="" type="text">
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <label class="control-label col-lg-2" for="inputSuccess">Minutos:</label>
                                <div class="col-sm-11">
                                  <input class="form-control" placeholder="" type="text">
                                </div>
                              </div>
                            </div>
                          </div>

                          <!------------------------------------------------- ------------------>
                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <label class="control-label col-lg-4" for="inputSuccess">Departamento:</label>
                              <div class="col-lg-12">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>

                              <label class="control-label col-lg-4" for="inputSuccess">Usuario asignado:</label>
                              <div class="col-lg-12">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>

                              <label class="control-label col-lg-4" for="inputSuccess">Agregar:</label>
                              <div class="col-lg-12">
                               <button type="button" class="btn btn-primary btn-lg btn-block"  onclick="mi_alerta()">Agregar</button>
                             </div>


                           </div>
                         </div>
                       </div>
                       <!------------------------------------------------- ------------------>
                       <div class="row">
                        <div class="col-lg-12 col-sm-12 follow-info">
                          <div class="form-group">
                            <table class="table table-striped table-advance table-hover">
                              <tbody>
                                <tr>
                                  <th><i class="icon_profile"></i>Título</th>
                                  <th><i class="icon_calendar"></i>Descripción</th>
                                  <th><i class="icon_mail_alt"></i>Departamento</th>
                                  <th><i class="icon_pin_alt"></i>Usuario</th>
                                  <th><i class="icon_mobile"></i>Horas</th>
                                  <th><i class="icon_mobile"></i>Minutos</th>
                                  <th><i class="icon_cogs"></i> Action</th>
                                </tr>
                                <tr>
                                  <td>Angeline Mcclain</td>
                                  <td>2004-07-06</td>
                                  <td>dale@chief.info</td>
                                  <td>Rosser</td>
                                  <td>Robert Lee</td>
                                  <td>176-026-5992</td>
                                  <td>
                                    <div class="btn-group">
                                      <a class="btn btn-danger"type="button" onclick="mi_alerta()"><i class="icon_close_alt2"></i></a>
                                    </div>
                                  </td>
                                </tr>
                                <tr>
                                  <td>Sung Carlson</td>
                                  <td>2011-01-10</td>
                                  <td>ione.gisela@high.org</td>
                                  <td>Robert Lee</td>
                                  <td>Robert Lee</td>
                                  <td>724-639-4784</td>
                                  <td>
                                    <div class="btn-group">
                                      <a class="btn btn-danger" type="button" onclick="mi_alerta()"><i class="icon_close_alt2"></i></a>
                                    </div>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>

                    </div>
                    <!-- AQUI TERMINA LA CEJILLA QUE CONTIENE EL CAMBIA EL DEPARTAMENTO -->
                  </div>
                  <button type="submit" class="btn btn-primary btn-lg btn-block">Abrir</button>
                </div>
              </form>
              <!-- AQUI TERMINA LAS CEJILLAS DONDE SE ECUENTRA PARA RESPONDER UN TICKET CAMBIAR DEPARTAMENTO CAMBIAR USUARIO-->
            </section>
          </div>
        </div>


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

