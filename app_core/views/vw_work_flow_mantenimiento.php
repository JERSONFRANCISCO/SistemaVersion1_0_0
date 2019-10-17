<?php
$Titulo =  "";
$Observaciones =  "";
$Departamento =  "";
$Usuario = "";
$Minutos = "";
$Horas="";
$Estado="";

$titulo='Agregar';
$readonly='';
$comboBOX='';



if(isset($_POST['Agregar'])){
//  require_once(__CTR_PATH . "ctr_tareas.php");
//  $ctr_tareas = new ctr_tareas();
//  $ctr = $ctr_tareas->insertar_tareas();
  $bolean=true;
  $titulo="Agregado";
}

if(isset($_POST['Editar'])){
 // require_once(__CTR_PATH . "ctr_tareas.php");
 // $ctr_tareas = new ctr_tareas();
//  $ctr = $ctr_tareas->actualizar_tareas();
  $bolean=true;
  $titulo="Actualizado";
}

if(isset($_POST['Eliminar'])){
//  require_once(__CTR_PATH . "ctr_tareas.php");
//  $ctr_tareas = new ctr_tareas();
//  $ctr = $ctr_tareas->eliminar_tareas();
  $bolean=true;
  $titulo="Eliminado";
}


/*
  Carga los datos de visualización cuando 
*/
  if(isset($_POST['botonEditar']) or isset($_POST['botonEliminar'])){
   // require_once(__CTR_PATH . "ctr_tareas.php");
  //  $ctr_tareas = new ctr_tareas();
  //  $ctr = $ctr_tareas->buscar_tareas();
  //  foreach ($ctr as $value) {
  //    $Titulo = $ctr[0][1];
   //   $Observaciones = $ctr[0][2];
  //    $Horas = $ctr[0][3];
  //    $Minutos = $ctr[0][4];
  //    $Usuario = $ctr[0][5];
  //    $Departamento = $ctr[0][6];
  //    $Estado = $ctr[0][7];
  //  }
  }

  if(isset($_POST['botonEditar'])){
    $readonly = 'required';
    $titulo='Editar';
  }else{
    if(isset($_POST['botonEliminar'])){
      $readonly = 'readonly';
      $titulo='Eliminar';
      $comboBOX='disabled';
    }
  }

  ?>


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
            <h3 class="page-header"><i class="fa fa-table"></i>Manteminiento de flujos de trabajo</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
             <?php
             if(isset($bolean)){
              if($bolean)
              {
               echo $HTML->Mensaje("Se ha </strong>$titulo correctamente el registro.","success");
             } 
           }
           ?>
           <header class="panel-heading">
            <strong><?php if(isset($titulo)){echo $titulo;}?> Tareas</strong>
          </header>
          <div class="panel-body">
            <div class="form">
              <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                <section class="panel">
                  <header class="panel-heading tab-bg-info">
                    <ul class="nav nav-tabs">
                      <li class="active">
                        <a data-toggle="tab" href="#detallesFLUJO">
                          Detalle del flujo de trabajo
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
                        <div id="detallesFLUJO" class="tab-pane active">
                          <div class="profile-activity">

                            <div class="form-group ">
                              <label for="Tarea" class="control-label col-lg-2">Código<span class="required">*</span></label>
                              <div class="col-lg-10">
                                <input class="form-control " id="TareaID" type="text"  name="TareaID" value='<?php if(isset($_POST['identificador'])) {echo $_POST['identificador'];} ?>' readonly/>
                              </div>
                            </div>

                            <div class="form-group ">
                              <label for="Titulo" class="control-label col-lg-2">Título<span class="required">*</span></label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" id="Titulo" name="Titulo"  value="<?php if(isset($Titulo)){echo $Titulo;}?>" placeholder=" " required <?php echo $readonly;?>>
                              </div>
                            </div>

                            <div class="form-group ">
                              <label for="Observaciones" class="control-label col-lg-2">Observaciones<span class="required">*</span></label>
                              <div class="col-lg-10">
                                <input type="text" class="form-control" id="Observaciones" name="Observaciones"  value="<?php if(isset($Observaciones)){echo $Observaciones;}?>" placeholder=" " required <?php echo $readonly;?>>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-lg-2" for="inputSuccess">Departamento</label>
                              <div class="col-lg-10">
                                <select class="form-control m-bot15 selectpicker" id="Departamento"  name="Departamento" name="Departamento" data-live-search="true" title="Selecione Departamento" <?php echo $comboBOX;?>>
                                  <?php
                                  require_once(__CTR_PATH . "ctr_departamentos.php");
                                  $ctr_departamentos = new ctr_departamentos();
                                  $ctr = $ctr_departamentos->obtener_Departamentos();
                                  echo $HTML->SelectedCombo($ctr,$Departamento);
                                  ?>
                                </select>
                              </div>
                            </div>

                            <div class="form-group">
                              <label class="control-label col-lg-2" for="inputSuccess">Estado</label>
                              <div class="col-lg-10">
                                <select class="form-control m-bot15 selectpicker" id="Estado" name="Estado" data-live-search="true" title="Selecione Estado" <?php echo $comboBOX;?>>
                                  <?php
                                  require_once(__CTR_PATH . "ctr_estandar.php");
                                  $ctr_estandar = new ctr_estandar(); 
                                  $ctr = $ctr_estandar->obtener_Catalogo('Estados');
                                  print_r($crt);
                                  echo $HTML->SelectedCombo($ctr,$Estado);
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- AQUI TERMINA LA CEJILLA QUE CONTIENE EL FORMULARIO DONDE SE LLENA LA INFORMACIÓN -->

                        <!-- AQUI INICIA LA CEJILLA QUE CONTIENE EL  -->
                        <div id="changeTareas" class="tab-pane">
                         <!------------------------------------------------- ------------------>
                         <div class="row">
                          <div class="col-lg-12 col-sm-12 follow-info">
                            <section class="panel" style="border-top: 5px solid #394a59;  border-bottom: 5px solid #394a59;">
                              <header class="panel-heading">
                                Tareas del flujo de trabajo asignadas
                              </header>
                              <div class="table-responsive" id="tablaConTareas" name="tablaConTareas">
                                <table class="table" id="tablaTareas" name="tablaTareas">
                                  <thead style="background-color: #00000000;">
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
                                  <tfoot style="background-color: #00000000;">
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
                                    <?php
                                    require_once(__CTR_PATH . "ctr_work_flow.php");
                                    $ctr_work_flow = new ctr_work_flow();
                                    $ctr = $ctr_work_flow->obtener_Tareas($_POST['identificador']);
                                    $cont = 0;
                                    foreach ($ctr as $value) {
                                      if($cont % 2 == 0){
                                        echo "<tr style = 'background: aliceblue;' >";
                                      }else{
                                        echo "<tr>";
                                      }
                                      echo "<td> <input  id='identificador' name='identificador' type='hidden' value='".$value[0]."'>".$value[0]."</td>";
                                      echo "<td>".$value[1]."</td>";
                                      echo "<td>".$value[2]."</td>";
                                      echo "<td>".$value[3]."</td>";
                                      echo "<td>".$value[4]."</td>";
                                      echo "<td>".$value[5]."</td>";
                                      echo "<td>".$value[6]."</td>";
                                      echo "<td>";
                                      echo "<div class='btn-group'>";
                                      echo "<button class='btn btn-danger'  id='botonEliminar' name='botonEliminar' type='bottom' title='Eliminar'><i class='icon_close_alt2'></i></button>";
                                      echo "</div>";
                                      echo "</td>";
                                      echo "</tr>";
                                      $cont++;
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </section>
                            <section class="panel" style="border-top: 5px solid #394a59;  border-bottom: 5px solid #394a59;">

                              <header class="panel-heading">
                                Tareas del flujo de trabajo disponibles
                              </header>
                              <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                  <thead style="background-color: #00000000;">
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
                                  <tfoot style="background-color: #00000000;">
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
                                    <?php
                                    require_once(__CTR_PATH . "ctr_work_flow.php");
                                    $ctr_work_flow = new ctr_work_flow();
                                    $ctr = $ctr_work_flow->obtener_Tareas_Disponibles($_POST['identificador']);
                                    $cont = 0;
                                    foreach ($ctr as $value) {
                                      if($cont % 2 == 0){
                                        echo "<tr style = 'background: aliceblue;' >";
                                      }else{
                                        echo "<tr>";
                                      }
                                      echo "<td> <input  id='identificador' name='identificador' type='hidden' value='".$value[0]."'>".$value[0]."</td>";
                                      echo "<td>".$value[1]."</td>";
                                      echo "<td>".$value[2]."</td>";
                                      echo "<td>".$value[3]."</td>";
                                      echo "<td>".$value[4]."</td>";
                                      echo "<td>".$value[5]."</td>";
                                      echo "<td>".$value[6]."</td>";
                                      echo "<td>";
                                      echo "<div class='btn-group'>";
                                      echo "<button class='btn btn-primary'  id='subeTarea' name='subeTarea' type='button' title='Agregar'><i class='icon_plus_alt2'></i></button>";
                                      echo "</div>";
                                      echo "</td>";
                                      echo "</tr>";
                                      $cont++;
                                    }
                                    ?>
                                  </tbody>
                                </table>
                              </div>
                            </section>
                          </div>
                        </div>

                      </div>
                      <!-- AQUI TERMINA LA CEJILLA QUE CONTIENE EL CAMBIA EL DEPARTAMENTO -->
                    </div>
                  </div>
                </form>
                <!-- AQUI TERMINA LAS CEJILLAS DONDE SE ECUENTRA PARA RESPONDER UN TICKET CAMBIAR DEPARTAMENTO CAMBIAR USUARIO-->
              </section>

              <div class="form-group">
                <div class="col-lg-offset-2 col-lg-10 text-right">
                  <button class="btn btn-primary" type="submit" id ="<?php if(isset($titulo)){echo $titulo;}?>" name="<?php if(isset($titulo)){echo $titulo;}?>">Guardar</button>
                  <button class="btn btn-default" ><a href="index.php">Cancelar</a></button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </section>
    </div>
  </div>


</section>
</section>

<?php
echo $HTML->html_footer();
?>

</section>