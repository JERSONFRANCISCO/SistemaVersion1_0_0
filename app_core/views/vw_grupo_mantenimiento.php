<?php

$titulo='';
$readonly='';
if(isset($_POST['botonEditar'])){
  $readonly = '';
  $titulo='Editar';
}else{
  if(isset($_POST['botonEliminar'])){
    $readonly = 'readonly';
    $titulo='Eliminar';
  }else{
    if(isset($_POST['botonAgregar'])){
      $readonly = '';
      $titulo='Agregar';
    }
  }
}

if(isset($_POST['Agregar'])){
  if(isset($_POST['Nombre']) AND isset($_POST['Descripcion']) AND isset($_POST['Estado'])AND isset($_POST['Departamento'])) 
  {
    require_once(__CTR_PATH . "ctr_grupo.php");
    $ctr_Grupo = new ctr_Grupo();
    $ctr = $ctr_Grupo->insertar_Grupo($_POST['Nombre'],$_POST['Descripcion'],substr($_POST['Estado'], 0,1),$_POST['Departamento'],'Jerson');
    $bolean=true;
    $titulo="Agregado";
  }
}

if(isset($_POST['Editar'])){
  if(isset($_POST['Nombre']) AND isset($_POST['Descripcion']) AND isset($_POST['Estado'])AND isset($_POST['Departamento'])) 
  {
    require_once(__CTR_PATH . "ctr_grupo.php");
    $ctr_Grupo = new ctr_Grupo();
    $ctr = $ctr_Grupo->actualizar_Grupo($_POST['Nombre'],$_POST['Descripcion'],substr($_POST['Estado'], 0,1),$_POST['Departamento'],'Jerson',$_POST['Grupo']);
    $bolean=true;
    $titulo="Actualizado";
  }
}
if(isset($_POST['Eliminar'])){
  if(isset($_POST['Nombre']) AND isset($_POST['Descripcion']) AND isset($_POST['Estado'])AND isset($_POST['Departamento'])) 
  {
    require_once(__CTR_PATH . "ctr_grupo.php");
    $ctr_Grupo = new ctr_Grupo();
    $ctr = $ctr_Grupo->eliminar_Grupo('','','B','','Jerson',$_POST['Grupo']);
    $bolean=true;
    $titulo="Eliminado";
  }
}


$gru_titulo='';
$gru_descripcion='';
$gru_estado='';
$gru_departamento='';
if(isset($_POST['botonEditar']) or isset($_POST['botonEliminar'])){
  require_once(__CTR_PATH . "ctr_grupo.php");
  $ctr_grupo = new ctr_grupo();
  $ctr = $ctr_grupo->buscar_Grupo($_POST['identificador']);
  foreach ($ctr as $value) {
    $gru_titulo= $value[1];
    $gru_descripcion= $value[2];
    $gru_estado= $value[3]; 
    $gru_departamento= $value[4];
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
          <h3 class="page-header"><i class="fa fa-table"></i>Manteminiento de grupos</h3>
        </div>
      </div>

      <?php
      if(isset($bolean)){
        if($bolean)
        {
          echo "<div class='panel-body'>";
          echo "<div class='alert alert-success fade in'>";
          echo "<button data-dismiss='alert' class='close close-sm' type='button'>";
          echo "<i class='icon-remove'></i>";
          echo "</button>";
          echo "<strong>Se ha $titulo correctamente el registro.</strong>";
          echo "</div>";
          echo "</div>";
        } 
      }
      ?>

      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
             <strong><?php if(isset($titulo)){echo $titulo;}?> Grupo</strong>
           </header>
           <div class="panel-body">
            <div class="form">
              <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group ">
                  <label for="Grupo" class="control-label col-lg-2">Grupo<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input class="form-control " id="Grupo" type="text" name="Grupo" value='<?php if(isset($_POST['identificador'])) {echo $_POST['identificador'];} ?>' readonly/>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="Nombre" class="control-label col-lg-2">Nombre<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input class="form-control " id="Nombre" type="text" name="Nombre" required value="<?php echo $gru_titulo;?>" <?php echo $readonly;?>/>
                  </div>
                </div>
                <div class="form-group ">
                  <label for="Descripcion" class="control-label col-lg-2">Descipción<span class="required">*</span></label>
                  <div class="col-lg-10">
                    <input class="form-control " id="Descripcion" type="text" name="Descripcion" <?php echo $readonly;?> value="<?php echo $gru_descripcion;?>"/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-lg-2" for="inputSuccess">Estado</label>
                  <div class="col-lg-10">
                    <select class="form-control m-bot15" id="Estado" name="Estado" <?php echo $readonly;?>>
                      <option>A - ACTIVO</option>
                      <option selected>I - INACTIVO</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-lg-2" for="inputSuccess">Departamento</label>
                  <div class="col-lg-10">
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


                <div class="form-group">
                  <div class="col-lg-offset-2 col-lg-10 text-right">
                    <button class="btn btn-primary" type="submit" id ="<?php if(isset($titulo)){echo $titulo;}?>" name="<?php if(isset($titulo)){echo $titulo;}?>">Guardar</button>
                    <button class="btn btn-default" type="submit" name="Cancelar"><a href="index.php">Cancelar</a></button>
                  </div>
                </div>
              </form>
            </div>

          </div>
        </section>
      </div>
    </div>

    <!-- page end-->
  </section>
</section>
<!--main content end-->
<?php
echo $HTML->html_footer();
?>
</section>