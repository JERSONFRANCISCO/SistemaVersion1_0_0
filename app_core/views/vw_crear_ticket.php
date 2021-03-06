<?php

/*
  funcion la cual agrega el ticket y agrega las tareas
*/
  if(isset($_POST['tituloTicket'])){
    require_once(__CTR_PATH . "ctr_ticket.php");
    $ctr_ticket = new ctr_ticket();
    $ctr = $ctr_ticket->insertar_ticket();
    $respuesta = $ctr_ticket->insertar_tareas_ticket($ctr);
    if($respuesta == 'true'){
     header("Location: crear_ticket.php?Result=true&Num=$ctr"); 
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
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo __IMG_PATH_GIF; ?>') 50% 50% no-repeat rgb(255,255,255);
    opacity: 1;
  }


  tr:nth-child(odd) {
    background-color:#ffffff;
  }
  tr:nth-child(even) {
   background: aliceblue;
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
  echo $HTML->html_cargandoPagina();
  ?>

  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <?php 
          if (isset($_GET["Result"])and isset($_GET["Num"])){
            if($_GET["Result"]=='true')
            {
              echo $HTML->Mensaje("Se creó el ticket <a href='hilo_ticket?ticket=".$_GET["Num"]."' style='color: #4cd964;'><strong>".$_GET["Num"]."</strong></a>  correctamente.","success");
            }
          }
          ?>

          <div class="row">
            <div class="col-lg-12">
              <header class="panel-heading">
                <div class="row">
                  <div class="col-lg-4">
                    Ticket nuevo 
                  </div>
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
                              <label class="control-label col-lg-4" id="alinearIzquierda" for="inputSuccess">Prioridad</label>
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
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Departamento</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreDepartamento" name="NombreDepartamento" data-live-search="true" title="Selecione Departamento" required>
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
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Usuario asignado</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreUsuario" name="NombreUsuario" data-live-search="true" title="Selecione usuario" required>
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
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Fecha de vencimiento</label>
                              <div class="col-lg-8">
                                <input type="date" name="Fecha_Vence" data-date-format="DD MMMM YYYY" min="2000-01-01" max="2100-01-01"  value="<?php echo date("Y-m-d"); ?>" class="form-control">
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Título</label>
                              <div class="col-lg-8">
                                <input class="form-control" id="tituloTicket" name="tituloTicket" placeholder="" type="text" required>
                              </div>

                            </div>
                          </div>

                          <div class="col-lg-6 col-sm-6 follow-info">
                            <div class="form-group">
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Cliente</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreClienteAJAX" name="NombreClienteAJAX" data-live-search="true" title="Selecione Cliente" onchange="cargarProyectoCliente();">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_Clientes("");
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[1]."'>".$value[0]."</option>"; 
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Proyecto</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="ProyectoClienteAjax" name="ProyectoClienteAjax" data-live-search="true" title="Selecione Proyecto" onchange="cargarOTCliente();">
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Orden de trabajo</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="OrdenDeTrabajoAJAX" name="OrdenDeTrabajoAJAX" data-live-search="true" title="Selecione Orden de trabajo" >
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Vendedor</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreVendedor" name="NombreVendedor" data-live-search="true" title="Selecione Vendedor">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_Vendedores("");
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[1]."'>".$value[0]."</option>"; 
                                  }
                                  ?>
                                </select>
                              </div>
                              <br><br>
                              <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Flujo de trabajo</label>
                              <div class="col-lg-8">
                                <select class="form-control m-bot15 selectpicker" id="NombreWFAJAX" name="NombreWFAJAX" data-live-search="true" title="Selecione Flujo de trabajo" onchange="cargarTareasWF();">
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar();
                                  $ctr = $ctr_estandar->obtener_WorkFLow();
                                  $cont = 0;
                                  foreach ($ctr as $value) {
                                    echo "<option data-subtext='".$value[1]."'>".$value[0]."</option>"; 
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
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">Agregar Tarea</button>
                          <!------------------------------------------------- ------------------>
                          <div class="row">
                            <div class="col-lg-12 col-sm-12 follow-info">
                              <section class="panel">
                                <header class="panel-heading">
                                  Tareas
                                </header>
                                <div class="table-responsive" id="tablaConTareas" name="tablaConTareas">
                                  <table class="table" id="tablaTareas" name="tablaTareas">
                                    <thead style="background-color: #f7f7f7;">
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
                                    <tfoot style="background-color: #f7f7f7;">
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

                    <!-- AQUI TERMINA LAS CEJILLAS DONDE SE ECUENTRA PARA RESPONDER UN TICKET CAMBIAR DEPARTAMENTO CAMBIAR USUARIO-->
                  </section>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
</section>


<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background-color: white;">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Tarea</h5>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <div class="col-lg-12">
            <label class="control-label col-lg-4" id="alinearIzquierda">Título</label>
            <div class="col-sm-12">
              <input class="form-control" placeholder="Título" type="text" id='tareaTitulo' name='tareaTitulo'>
            </div>
          </div>
          <div class="col-lg-12">
            <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Descripción</label>
            <div class="col-sm-12">
              <input class="form-control" placeholder="Descripción" type="text" id='tareaDescripcion' name='tareaDescripcion'>
            </div>
          </div>
          <div class="col-lg-6">
            <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Horas</label>
            <div class="col-sm-12">
              <input class="form-control" placeholder="Horas" type="number" min="1" maxlength="2" value="0" id='tareaHoras' name='tareaHoras'>
            </div>
          </div>
          <div class="col-lg-6">
            <label class="control-label col-lg-4" for="inputSuccess" id="alinearIzquierda">Minutos</label>
            <div class="col-sm-12">
              <input class="form-control" placeholder="Minutos" type="number" maxlength="2" min="1" value="0" id='tareaMinutos' name='tareaMinutos'>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-11" style="left: 2%;">
              <label class="control-label col-lg-6" for="inputSuccess" id="alinearIzquierda">Departamento</label>
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
            </div>

            <div class="col-lg-11" style="left: 2%;">
              <label class="control-label col-lg-6" for="inputSuccess" id="alinearIzquierda">Usuario asignado</label>
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
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="botonAgregarTarea" name="botonAgregarTarea" onclick="agregarFila_Tareas()">Agregar</button>
      </div>
    </div>
  </div>
</div>

<!--main content end-->
<?php
echo $HTML->html_footer();
?>
</section>

