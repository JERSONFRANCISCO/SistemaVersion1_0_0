<?php

if(isset($_POST['Nombre']) AND isset($_POST['Descripcion']) AND isset($_POST['Estado'])AND isset($_POST['Departamento'])) 
{
  require_once(__CTR_PATH . "ctr_grupo.php");
  $ctr_Grupo = new ctr_Grupo();
  $ctr = $ctr_Grupo->insertar_Grupo($_POST['Nombre'],$_POST['Descripcion'],$_POST['Estado'],2,'Jerson');
  $bolean=true;
  $titulo="Agregado";
}
$titulo='Agregar';
$readonly='';
if(isset($_POST['botonVer'])){
  $readonly = 'readonly';
  $titulo='Ver';
}else{
  if(isset($_POST['botonEditar'])){
    $readonly = '';
    $titulo='Editar';
  }else{
    if(isset($_POST['botonEliminar'])){
      $readonly = 'readonly';
      $titulo='Eliminar';
    }
  }
}
?>
<script>

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
  <aside>
    <div id="sidebar" class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu">
        <li class="">
          <a class="" href="index.html">
            <i class="icon_house_alt"></i>
            <span>Pagina Principal</span>
          </a>
        </li>

        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon_table"></i>
            <span>Mantenimiento</span>
            <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a class="active" href="index.php">Departamentos</a></li>
            <li><a class="active" href="grupo.php">Grupos</a></li>
          </ul>

        </li>
      </ul>
      <!-- sidebar menu end-->
    </div>
  </aside>

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
                    <label for="Grupo" class="control-label col-lg-2">Grupo<span class="required">*</span></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="Grupo" type="text" name="Grupo" placeholder='<?php if(isset($_POST['identificador'])) {echo $_POST['identificador'];} ?>' values='<?php if(isset($_POST['identificador'])) {echo $_POST['identificador'];} ?>' readonly/>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="Nombre" class="control-label col-lg-2">Nombre<span class="required">*</span></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="Nombre" type="text" name="Nombre" required />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="Descripcion" class="control-label col-lg-2">Descipción<span class="required">*</span></label>
                    <div class="col-lg-10">
                      <input class="form-control " id="Descripcion" type="text" name="Descripcion" />
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Estado</label>
                    <div class="col-lg-10">
                      <select class="form-control m-bot15" id="Estado" name="Estado">
                        <option >ACTIVO</option>
                        <option >INACTIVO</option>
                        <option >BLOQUEADO</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-lg-2" for="inputSuccess">Departamento</label>
                    <div class="col-lg-10">
                      <select class="form-control m-bot15" id="Departamento" name="Departamento">
                        <option>01 - TECNOLOGÍAS DE INFORMACIÓN</option>
                        <option>02 - CONTABILIDAD</option>
                      </select>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10 text-right">
                      <button class="btn btn-primary" type="submit">Guardar</button>
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
  <div class="text-center">
    <div class="credits">

      Diseñado por <a href="http://dialcomcr.com/">DIALCOM</a>
    </div>
  </div>
</section>