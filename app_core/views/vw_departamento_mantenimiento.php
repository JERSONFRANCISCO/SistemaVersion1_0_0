<?php

$titulo='Agregar';

/*
  Se verifica si la acción del boton agregar fue ejecutada para así agregar un nuevo registro
*/
if(isset($_POST['Agregar'])){
  if(isset($_POST['Nombre']) AND isset($_POST['Descripcion']) AND isset($_POST['Estado'])) 
  {
    require_once(__CTR_PATH . "ctr_departamentos.php");
    $ctr_departamentos = new ctr_departamentos();
    $ctr = $ctr_departamentos->insertar_Departamento($_POST['Nombre'],$_POST['Descripcion'],substr($_POST['Estado'], 0,1),'Jerson');
    $bolean=true;
    $titulo="Agregado";
  }
}

if(isset($_POST['Editar'])){
  if(isset($_POST['Nombre']) AND isset($_POST['Descripcion']) AND isset($_POST['Estado'])) 
  {
    require_once(__CTR_PATH . "ctr_departamentos.php");
    $ctr_departamentos = new ctr_departamentos();
    $ctr = $ctr_departamentos->actualizar_Departamento($_POST['Nombre'],$_POST['Descripcion'],substr($_POST['Estado'], 0,1),'Jerson',$_POST['Departamentoid']);
    $bolean=true;
    $titulo="Actualizado";
  }
}

if(isset($_POST['Eliminar'])){
  if(isset($_POST['Nombre']) AND isset($_POST['Descripcion']) AND isset($_POST['Estado'])) 
  {
    require_once(__CTR_PATH . "ctr_departamentos.php");
    $ctr_departamentos = new ctr_departamentos();
    $ctr = $ctr_departamentos->actualizar_Departamento($_POST['Nombre'],$_POST['Descripcion'],'B','Jerson',$_POST['Departamentoid']);
    $bolean=true;
    $titulo="Eliminado";
  }
}


$NombreDep='';
$DEP_descripcion='';
$DEP_Estado='';
if(isset($_POST['botonVer']) or isset($_POST['botonEditar']) or isset($_POST['botonEliminar'])){
  require_once(__CTR_PATH . "ctr_departamentos.php");
  $ctr_departamentos = new ctr_departamentos();
  $ctr = $ctr_departamentos->buscar_Departamento($_POST['identificador']);
  foreach ($ctr as $value) {
    $NombreDep= $value[1];
    $DEP_descripcion= $value[2];
    $DEP_Estado= $value[3];
  }
}




$readonly='';
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
    }
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

    <a href="index.html" class="logo">EMPRESA CLIENTE <span class="lite"> DIALCOM TICKETS</span></a>

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
          <h3 class="page-header"><i class="fa fa-table"></i>Manteminiento de departamentos</h3>
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
          echo "<strong>Se ha </strong>$titulo correctamente el registro.";
          echo "</div>";
          echo "</div>";
        } 
      }
      ?>

      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              <strong><?php if(isset($titulo)){echo $titulo;}?> departamentos</strong>
            </header>
            <div class="panel-body">
              <div class="form">
                <form class="form-validate form-horizontal" id="feedback_form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                  <div class="form-group ">
                    <label for="Departamento" class="control-label col-lg-2">Departamento<span class="required">*</span></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="Departamentoid" type="text"  name="Departamentoid" value='<?php if(isset($_POST['identificador'])) {echo $_POST['identificador'];} ?>' readonly/>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="Nombre" class="control-label col-lg-2">Nombre<span class="required">*</span></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="Nombre" minlength="5" value="<?php echo $NombreDep;?>" maxlength="50" type="text" name="Nombre" required <?php echo $readonly;?> />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="Descripcion" class="control-label col-lg-2">Descipción<span class="required">*</span></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="Descripcion" minlength="5" maxlength="100" type="text" value="<?php echo $DEP_descripcion;?>" name="Descripcion" <?php echo $readonly;?>/>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Estado</label>
                    <div class="col-lg-10">
                      <select class="form-control m-bot15" id="Estado" name="Estado" <?php echo $readonly;?>>
                        <option>A - ACTIVO</option>
                        <option>I - INACTIVO</option>
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

      <!-- page end-->
    </section>
  </section>
  <!--main content end-->
  <?php
  echo $HTML->html_footer();
  ?>
</section>