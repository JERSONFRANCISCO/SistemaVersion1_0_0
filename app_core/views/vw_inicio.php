<?php 

?>

<style type="text/css">
  .drag-drop-item
  {
    touch-action: none;
  }
  
  .zoom {
    transition: transform .2s; /* Animation */
  }
  .zoom:hover {
    transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
  }

  .zoomtabla {
    transition: transform .2s; /* Animation */
  }
  .zoomtabla:hover {
    transform: scale(1.025); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
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
  ?>


  <!--main content start-->
  <section id="main-content">
    <section class="wrapper">
      <div class="row">

        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-table"></i>INICIO</h3>
          <div class="row">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 zoom">
                  <div class="info-box blue-bg">
                    <i class="fas fa-ticket-alt"></i>
                    <div class="count">6.674</div> 
                    <div class="title">Tareas Pendientes</div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 zoom">
                  <div class="info-box brown-bg">
                    <i class="fas fa-ticket-alt"></i>
                    <div class="count">7.538</div>
                    <div class="title">Tickets Atrasados</div>
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 zoom">
                  <div class="info-box dark-bg">
                    <i class="fas fa-ticket-alt"></i>
                    <div class="count">4.362</div>
                    <div class="title">Tickets Abiertos</div>
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 zoom">
                  <div class="info-box green-bg">
                    <i class="fas fa-ticket-alt"></i>
                    <div class="count">1.426</div>
                    <div class="title">Tickets Cerrados</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-12">
          <!--Project Activity start-->
          <section class="panel">
            <div class="panel-body progress-panel">
              <div class="row">
                <div class="col-lg-8 task-progress pull-left">
                  <h1>Tareas Pendientes</h1>
                </div>
                <div class="col-lg-4">
                  <span class="profile-ava pull-right">
                    <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                      <?php if(isset($_SESSION['USR_nombre'])){ echo $_SESSION['USR_nombre'];}?>
                  </span>
                </div>
              </div>
            </div>
            <table class="table table-hover personal-task">
              <tbody>
                <tr class="zoomtabla">
                  <td>HOY</td>
                  <td>
                    Detalle del ticket
                  </td>
                  <td>
                    <span class="badge bg-important">Ticket</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>HOY</td>
                  <td>
                    Detalle de la tarea
                  </td>
                  <td>
                    <span class="badge bg-success">Tarea</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>21-10-14</td>
                  <td>
                    Detalle de la tarea
                  </td>
                  <td>
                    <span class="badge bg-success">Tarea</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>22-10-14</td>
                  <td>
                    Detalle de la tarea
                  </td>
                  <td>
                    <span class="badge bg-success">Tarea</span>
                  </td>
                <!--  <td>
                    <span class="badge bg-primary">To-Do</span>
                  </td> -->
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>24-10-14</td>
                  <td>
                    Detalle de la tarea
                  </td>
                  <td>
                    <span class="badge bg-success">Tarea</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>28-10-14</td>
                  <td>
                    Detalle de la tarea
                  </td>
                  <td>
                    <span class="badge bg-success">Tarea</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>MAÑANA</td>
                  <td>
                    Detalle de la tarea
                  </td>
                  <td>
                    <span class="badge bg-success">Tarea</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>MAÑANA</td>
                  <td>
                    Detalle de la tarea
                  </td>
                  <td>
                    <span class="badge bg-success">Tarea</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="tamanoimg simple" src="<?php echo __RSC_PHO_USR_HOST_PATH;if(isset($_SESSION['USR_img'])){ echo $_SESSION['USR_img'];}?>" >
                    </span>
                  </td>
                </tr>
              </tbody>
            </table>
          </section>
          <!--Project Activity end-->
        </div>
      </div>
    </section>
  </section>


  <?php
  echo $HTML->html_footer();
  ?>
</section>
