<?php
$Rol =  "";
$Estado =  "";
$Grupo =  "";
$Nombre = "";
$Correo = "";

$titulo='Agregar';
$readonly='';
$comboBOX='';

if(isset($_POST['botonVer'])){
  $readonly = 'readonly';
  $titulo='Ver';
}else{
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
}


if(isset($_POST['Agregar'])){
  require_once(__CTR_PATH . "ctr_usuario.php");
  $ctr_usuario = new ctr_usuario();
  $ctr = $ctr_usuario->insertar_Usuarios();
  $bolean=true;
  $titulo="Agregado";
}

if(isset($_POST['Editar'])){
  require_once(__CTR_PATH . "ctr_usuario.php");
  $ctr_usuario = new ctr_usuario();
  $ctr = $ctr_usuario->actualizar_Usuarios();
  $bolean=true;
  $titulo="Actualizado";
}

if(isset($_POST['Eliminar'])){
  require_once(__CTR_PATH . "ctr_usuario.php");
  $ctr_usuario = new ctr_usuario();
  $ctr = $ctr_usuario->eliminar_Usuarios();
  $bolean=true;
  $titulo="Eliminado";
}


/*
  Carga los datos de visualización cuando 
*/
  if(isset($_POST['botonVer']) or isset($_POST['botonEditar']) or isset($_POST['botonEliminar'])){
    require_once(__CTR_PATH . "ctr_usuario.php");
    $ctr_usuario = new ctr_usuario();
    $ctr = $ctr_usuario->buscar_Usuarios();
    foreach ($ctr as $value) {
      $Nombre = $value[1];
      $Correo = $value[3];
      $Rol =  $value[5];
      $Estado =  $value[6];
      $Grupo =  $value[4];
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
            <h3 class="page-header"><i class="fa fa-table"></i>Manteminiento de usuarios</h3>
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
            <strong><?php if(isset($titulo)){echo $titulo;}?> Usuarios</strong>
          </header>
          <div class="panel-body">
            <div class="form">
              <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group ">
                  <label for="Usuario" class="control-label col-lg-2">Usuario<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input class="form-control " id="usuarioID" type="text"  name="usuarioID" value='<?php if(isset($_POST['identificador'])) {echo $_POST['identificador'];} ?>' readonly/>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="Nombre" class="control-label col-lg-2">Nombre<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="Nombre" name="Nombre"  value="<?php if(isset($Nombre)){echo $Nombre;}?>" placeholder=" " required <?php echo $readonly;?>>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="Password" class="control-label col-lg-2">Password<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input type="Password" class="form-control" id="Password" name="Password" placeholder=""  required <?php echo $readonly;?>>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="Correo" class="control-label col-lg-2">Correo<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input type="email" class="form-control" id="Correo" name="Correo" value="<?php if(isset($Correo)){echo $Correo;}?>" placeholder="" required <?php echo $readonly;?>>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2" for="inputSuccess">Grupo</label>
                  <div class="col-lg-10">
                    <select class="form-control m-bot15 selectpicker" id="Grupo"  name="Grupo" name="Grupo" data-live-search="true" title="Selecione Grupo" <?php echo $comboBOX;?>>
                      <?php
                      require_once(__CTR_PATH . "ctr_grupo.php");
                      $ctr_grupo = new ctr_grupo();
                      $ctr = $ctr_grupo->obtener_Grupos();
                      echo $HTML->SelectedCombo($ctr,$Grupo);
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2" for="inputSuccess">Rol</label>
                  <div class="col-lg-10">
                    <select class="form-control m-bot15 selectpicker" id="Rol" name="Rol" data-live-search="true" title="Selecione tipo de usuario" <?php echo $comboBOX;?>>
                      <?php
                      require_once(__CTR_PATH . "ctr_estandar.php");
                      $ctr_estandar = new ctr_estandar(); 
                      $ctr = $ctr_estandar->obtener_Catalogo('Roles');
                      echo $HTML->SelectedCombo($ctr,$Rol);
                      ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2" for="inputSuccess">Estado</label>
                  <div class="col-lg-10">
                    <select class="form-control m-bot15 selectpicker" id="Estado" name="Estado" <?php echo $comboBOX;?>>
                      <?php
                      require_once(__CTR_PATH . "ctr_estandar.php");
                      $ctr_estandar = new ctr_estandar(); 
                      $ctr = $ctr_estandar->obtener_Catalogo('Estados');
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