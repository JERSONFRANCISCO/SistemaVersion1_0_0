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
              <img alt="" src="app_core/resources/usrimg/usr001.jpg" style="">
            </span>
            <span class="username"><?php if(isset($_SESSION['USR_nombre'])){ echo $_SESSION['USR_nombre'];}?></span>
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
              <a href="login.php"><i class="icon_key_alt"></i> Log Out</a>
            </li>
            <li>
              <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
            </li>
            <li>
              <a><i class="icon_key_alt"></i><?php if(isset($_SESSION['USR_correo'])){ echo $_SESSION['USR_correo'];}?></a>
            </li>
          </ul>
        </li>
      </ul>
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
          <!--<ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-table"></i>Table</li>
            <li><i class="fa fa-th-list"></i>Basic Table</li>
          </ol>-->
        </div>
      </div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Departamentos
            </header>
            <div class="panel-body">
              <form class="form-inline" role="form" action="grupo_mantenimiento.php">
                <div class="text-right">
                  <button type="submit" class="btn btn-primary align-self-end">Agregar</button>
                </div>
                <div class="form-group text-left">
                  <input type="text" class="form-control" style="width: 250%;" id="" placeholder="Buscar">
                </div>
              </form>
            </div>
          </section>
        </div>
      </div>
      
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Departamentos
            </header>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Grupo</th>
                    <th>Nombre</th>
                    <th>Observaciones</th>
                    <th>Estado</th>
                    <th>Departamento</th>
                    <th>Nombre</th>
                    <th><i class="fa fa-calendar"></i> Fecha Creacion</th>
                    <th><i class="icon_cogs"></i> Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once(__CTR_PATH . "ctr_grupo.php");
                  $ctr_grupo = new ctr_grupo();
                  $ctr = $ctr_grupo->obtener_Objetos();
                  $cont = 0;
                  foreach ($ctr as $value) {
                    echo "<form method='GET' action='grupo_mantenimiento.php'>";
                    if($cont % 2 == 0){
                      echo "<tr style = 'background: aliceblue;' >";//    background: aliceblue;
                    }else{
                      echo "<tr>";
                    }
                    echo "<td>".$value[0]."</td>";
                    echo "<td>".$value[1]."</td>";
                    echo "<td>".$value[2]."</td>";
                    echo "<td>".$value[3]."</td>";
                    echo "<td>".$value[4]."</td>";
                    echo "<td>".$value[5]."</td>";
                    echo "<td>".$value[6]."</td>";
                  //  echo "<td>".$value[6]."</td>";
                    echo "<td>";
                    echo "<div class='btn-group'>";
                    echo "<button class='btn btn-primary'  type='submit' title='Ver'><i class='fas fa-eye'></i></button>";
                    echo "<button class='btn btn-success'  type='submit' title='Editar'><i class='fas fa-edit'></i></button>";
                    echo "<button class='btn btn-danger'  type='submit' title='Eliminar'><i class='icon_close_alt2'></i></button>";
                    echo "</div>";
                    echo "</td>";
                    //echo "<td>".$value[5]."</td>";
                    echo "</tr>";
                    $cont++;
                    echo "</form>";
                  }
                  ?>
                </tbody>
              </table>

            </div>

          </section>
          <section class="panel">
            <div class="text-center">
              <ul class="pagination">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
              </ul>
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