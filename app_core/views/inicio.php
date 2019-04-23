<script>
  function sumar(cant,costo,cont)
  {
    var total;
    if(cant.value && costo.value){
      total = parseFloat(cant.value)*parseFloat(costo.value);
//      alert(cant.value +"-"+costo.value+"-"+total);
      document.getElementById("subtotal"+cont).innerHTML = total.toFixed(2);
    }  
 }
</script>
<!-- container section start -->
<section id="container" class="">
  <!--header start-->
  <header class="header dark-bg">
    <div class="toggle-nav">
      <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
    </div>

    <a href="index.html" class="logo">COTIZACIONES <span class="lite">ADOBE RENT A CAR</span></a>

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
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sub-menu">
          <a href="javascript:;" class="">
            <i class="icon_table"></i>
            <span>Cotizar</span>
            <span class="menu-arrow arrow_carrot-right"></span>
          </a>
          <ul class="sub">
            <li><a class="active" href="index.php">Cotizar</a></li>
            <li><a class="active" href="basic_table2.php">Cotizaciones Realizadas</a></li>
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
          <h3 class="page-header"><i class="fa fa-table"></i> Table</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="fa fa-table"></i>Table</li>
            <li><i class="fa fa-th-list"></i>Basic Table</li>
          </ol>
        </div>
      </div>
      <!-- page start-->
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Responsive tables
            </header>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Requisición</th>
                    <th>Fecha</th>
                    <th>Código</th>
                    <th>Numero Parte</th>
                    <th>Descripción</th>
                    <th>Cantidad solicitada</th>
                    <th>Cantidad Ofrecida</th>
                    <th>Precio Ofrecido</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  require_once(__CTR_PATH . "ctr_inicio.php");
                  $ctr_inicio = new ctr_inicio();
                  $ctr = $ctr_inicio->obtener_Objetos();
                  $cont = 0;
                  foreach ($ctr as $value) {
                    echo "<form>";
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
                    echo "<td><input type='number' name = 'cant' class='form-control' style='text-align: right;max-width: 100px;' type='text' placeholder='0' onchange='sumar(cant,costo,".$cont.")'></td>";
                    echo "<td><input type='number' name = 'costo'  class='form-control' style='text-align: right;max-width: 200px;' type='text' placeholder='0' onchange='sumar(cant,costo,".$cont.")'></td>";
                    echo "<td id = 'subtotal".$cont."' name = 'subtotal' style='text-align: right;'>0</td>";
                    echo "</tr>";
                    $cont++;
                    echo "</form>";
                  }
                  ?>
                </tbody>
              </table>
            </div>

          </section>
        </div>
      </div>
      <!-- page end-->
    </section>
  </section>
  <!--main content end-->
  <div class="text-right">
    <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
      </div>
    </section>