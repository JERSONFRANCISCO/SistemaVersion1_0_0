
<?php


if(isset($_POST['Prioridad'])){
 // echo "Prioridad".substr($_POST['Prioridad'], 0,1)."<br>";
}
if(isset($_POST['NombreDepartamento'])){
 // echo "NombreDepartamento".$_POST['NombreDepartamento']."<br>";
}
if(isset($_POST['NombreUsuario'])){
 // echo "NombreUsuario".$_POST['NombreUsuario']."<br>";
}
if(isset($_POST['NombreCliente'])){
  //echo "NombreCliente".$_POST['NombreCliente']."<br>";
}
if(isset($_POST['NombreProyecto'])){
  //echo "NombreProyecto".$_POST['NombreProyecto']."<br>";
}
if(isset($_POST['OrdenDeTrabajo'])){
  //echo "OrdenDeTrabajo".$_POST['OrdenDeTrabajo']."<br>";
}
if(isset($_POST['NombreVendedor'])){
 // echo "NombreVendedor".$_POST['NombreVendedor']."<br>";
}
if(isset($_POST['summernote'])){
  //echo "summernote".$_POST['summernote']."<br>";
}
if(isset($_POST['tituloTicket'])){
 // echo "tituloTicket".$_POST['tituloTicket']."<br>";
  require_once(__CTR_PATH . "ctr_ticket.php");
  $ctr_ticket = new ctr_ticket();
  $ctr = $ctr_ticket->insertar_ticket(substr($_POST['Prioridad'], 0,1),$_POST['NombreVendedor'],$_POST['NombreCliente'],'123',0,$_POST['NombreDepartamento'],'A',$_POST['tituloTicket'],$_POST['summernote'],'JERSON');
  //echo $ctr;
  
}
if(isset($_POST['numeroDeTareas'])){
  echo "<br> numero de tareas: " . $_POST['numeroDeTareas']."<br>";
  for($i = 1 ; $i <= $_POST['numeroDeTareas'] ; $i++ ){
    echo $_POST['tareatareaTitulo'.$i];

  }
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
  .inner{
    max-width: 10px;
  }
  .open > .dropdown-menu{
    opacity: 1;
  }
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
          <!-- <h3 class="page-header"><i class="fa fa-table"></i>Ticket 0001</h3> -->
          <div class="row">
            <div class="col-lg-12">
              <header class="panel-heading">
                <div class="row">
                  <div class="col-lg-4">
                    Ticket nuevo 
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
              <form class="form-horizontal " method="POST" action="crear_ticket.php">
                <div class="row">
                  <!-- profile-widget -->
                  <div class="col-lg-12">
                    <div class="profile-widget profile-widget-info">
                      <div class="panel-body" style="color: black;background-color: white;">

                        <div row>
                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <label class="control-label col-lg-4" id="alinearIzquierda" for="inputSuccess">Prioridad:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Prioridad" name="Prioridad" title="Selecione la prioridad">
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
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Departamento:</label>
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
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Usuario asignado:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreUsuario" name="NombreUsuario" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_usuario.php");
                                  $ctr_usuario = new ctr_usuario();
                                  $ctr = $ctr_usuario->obtener_Usuarios();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Fecha de vencimiento:</label>
                              <div class="col-lg-8">
                                <input size="16" type="text" class="form-control" id="datetime" >
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Título:</label>
                              <div class="col-sm-8">
                                <input class="form-control" id="tituloTicket" name="tituloTicket" placeholder="" type="text">
                              </div>

                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Cliente:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreCliente" name="NombreCliente" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_Clientes("");
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[0]."'>".$value[1]."</option>"; 
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Proyecto:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreProyecto" name="NombreProyecto" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_Proyectos("");
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[0]."'>".$value[1]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Orden de trabajo:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="OrdenDeTrabajo" name="OrdenDeTrabajo" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_OrdenesTrabajo("");
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[0]."'>".$value[1]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Vendedor:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreVendedor" name="NombreVendedor" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_Vendedores("");
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[0]."'>".$value[1]."</option>"; 
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Flujo de trabajo:</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_WorkFLow();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[0]."'>".$value[1]."</option>"; 
                                  }
                                  ?>
                                </select>
                              </div>
                            </div>
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
                              <textarea id="summernote" name="summernote" ></textarea>
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
                                <label class="control-label col-lg-4" id="alinearIzquierda">Título:</label>
                                <div class="col-sm-12">
                                  <input class="form-control" placeholder="Título" type="text" id='tareaTitulo' name='tareaTitulo'>
                                </div>
                              </div>
                              <div class="col-lg-12">
                                <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Descripción:</label>
                                <div class="col-sm-12">
                                  <input class="form-control" placeholder="Descripción" type="text" id='tareaDescripcion' name='tareaDescripcion'>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Horas:</label>
                                <div class="col-sm-12">
                                  <input class="form-control" placeholder="Horas" type="number" min="1" maxlength="2"  id='tareaHoras' name='tareaHoras'>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Minutos:</label>
                                <div class="col-sm-12">
                                  <input class="form-control" placeholder="Minutos" type="number" maxlength="2" min="1" id='tareaMinutos' name='tareaMinutos'>
                                </div>
                              </div>
                            </div>
                          </div>

                          <!------------------------------------------------- ------------------>
                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Departamento:</label>
                              <div class="col-lg-12">
                                <select class="form-control m-bot15 selectpicker" id="tareaDepartamento" name="tareaDepartamento" data-live-search="true" title="Selecione Departamento">
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

                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Usuario asignado:</label>
                              <div class="col-lg-12">
                                <select class="form-control m-bot15 selectpicker" id="tareaUsuario" name="tareaUsuario" data-live-search="true" title="Selecione Departamento">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_usuario.php");
                                  $ctr_usuario = new ctr_usuario();
                                  $ctr = $ctr_usuario->obtener_Usuarios();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option>".$value[0]."</option>";  
                                  }
                                  ?>
                                </select>
                              </div>

                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda" name="totalDeTareas" value="0" style="color: white;">0</label>
                              <input type="number" id="numeroDeTareas" name="numeroDeTareas" value="0" style="display: none;">
                              <div class="col-lg-12">
                               <button type="button" class="btn btn-primary btn-lg btn-block" id="botonAgregarTarea" name="botonAgregarTarea" onclick="agregarFila_Tareas()">Agregar</button>
                             </div>
                           </div>
                         </div>
                       </div>
                       <!------------------------------------------------- ------------------>
                       <div class="row">
                        <div class="col-lg-12 col-sm-12 follow-info">
                          <section class="panel">
                            <header class="panel-heading">
                              Tareas
                            </header>
                            <div class="table-responsive" id="tablaConTareas" name="tablaConTareas">
                              <table class="table" id="tablaTareas" name="tablaTareas">
                                <thead style="background-color: #394a593b;">
                                  <tr>
                                    <th>Tarea</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Departamento</th>
                                    <th>Usuario Asignado</th>
                                    <th>Horas</th>
                                    <th>Minutos</th>
                                    <th>Acción</th>
                                  </tr>
                                </thead>
                                <tfoot style="background-color: #394a593b;">
                                  <tr>
                                    <th>Tarea</th>
                                    <th>Título</th>
                                    <th>Descripción</th>
                                    <th>Departamento</th>
                                    <th>Usuario Asignado</th>
                                    <th>Horas</th>
                                    <th>Minutos</th>
                                    <th>Acción</th>
                                  </tr>
                                </tfoot>
                                <tbody>
                                </tbody>
                              </table>
                            </div>
                          </section>
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

