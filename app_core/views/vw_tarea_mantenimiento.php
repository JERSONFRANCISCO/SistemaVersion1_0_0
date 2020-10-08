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
  require_once(__CTR_PATH . "ctr_tareas.php");
  $ctr_tareas = new ctr_tareas();
  $ctr = $ctr_tareas->insertar_tareas();
  $bolean=true;
  $titulo="Agregado";
}

if(isset($_POST['Editar'])){
  require_once(__CTR_PATH . "ctr_tareas.php");
  $ctr_tareas = new ctr_tareas();
  $ctr = $ctr_tareas->actualizar_tareas();
  $bolean=true;
  $titulo="Actualizado";
}

if(isset($_POST['Eliminar'])){
  require_once(__CTR_PATH . "ctr_tareas.php");
  $ctr_tareas = new ctr_tareas();
  $ctr = $ctr_tareas->eliminar_tareas();
  $bolean=true;
  $titulo="Eliminado";
}


/*
  Carga los datos de visualización cuando 
*/
  if(isset($_POST['botonEditar']) or isset($_POST['botonEliminar'])){
    require_once(__CTR_PATH . "ctr_tareas.php");
    $ctr_tareas = new ctr_tareas();
    $ctr = $ctr_tareas->buscar_tareas();
    foreach ($ctr as $value) {
      $Titulo = $ctr[0][1];
      $Observaciones = $ctr[0][2];
      $Horas = $ctr[0][3];
      $Minutos = $ctr[0][4];
      $Usuario = $ctr[0][5];
      $Departamento = $ctr[0][6];
      $Estado = $ctr[0][7];
    }
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
            <h3 class="page-header"><i class="fa fa-table"></i>Manteminiento de tareas</h3>
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

                <div class="form-group ">
                  <label for="Tarea" class="control-label col-lg-2">Tarea<span class="required">*</span></label>
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
                  <label class="control-label col-lg-2" for="inputSuccess">Usuario</label>
                  <div class="col-lg-10">
                    <select class="form-control m-bot15 selectpicker" id="Usuario"  name="Usuario" name="Usuario" data-live-search="true" title="Selecione Usuario" <?php echo $comboBOX;?>>
                      <?php
                        require_once(__CTR_PATH . "ctr_usuario.php");
                        $ctr_usuario = new ctr_usuario();
                        $ctr = $ctr_usuario->obtener_Usuarios();
                        echo $HTML->SelectedCombo($ctr,$Usuario);
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group ">
                  <label for="Correo" class="control-label col-lg-2">Horas<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input class="form-control" placeholder="Horas" type="number" maxlength="2" min="1" id='tareaHoras' value="<?php if(isset($Observaciones)){echo $Horas;}?>"  max="99" name='tareaHoras'>
                  </div>
                </div>
                
                <div class="form-group ">
                  <label for="Correo" class="control-label col-lg-2">Minutos<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input class="form-control" placeholder="Minutos" type="number" min="1" maxlength="2"  id='tareaMinutos' value="<?php if(isset($Observaciones)){echo $Minutos;}?>"   max="99" name='tareaMinutos'>
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