<style type="text/css">
  .drag-drop-item
  {
    touch-action: none;
  }
  img{
    height: 29px; 
    width: 25px;
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

    <a href="index.html" class="logo">EMPRESA CLIENTE <span class="lite"> DIALCOM TICKETS</span></a>

    <div class="top-nav notification-row">
      <ul class="nav pull-right top-menu">
        <li class="dropdown">
          <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <span class="profile-ava">
              <img alt="" src="app_core/resources/usrimg/usr001.jpg" style="">
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
              <a href="login.php"><i class="icon_key_alt"></i> Log Out</a>
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
                    <div class="title">Download</div>
                  </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 zoom">
                  <div class="info-box brown-bg">
                    <i class="fas fa-ticket-alt"></i>
                    <div class="count">7.538</div>
                    <div class="title">Purchased</div>
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 zoom">
                  <div class="info-box dark-bg">
                    <i class="fas fa-ticket-alt"></i>
                    <div class="count">4.362</div>
                    <div class="title">Order</div>
                  </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 zoom">
                  <div class="info-box green-bg">
                    <i class="fas fa-ticket-alt"></i>
                    <div class="count">1.426</div>
                    <div class="title">Stock</div>
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
                  <h1>To Do Everyday</h1>
                </div>
                <div class="col-lg-4">
                  <span class="profile-ava pull-right">
                    <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    Jenifer smith
                  </span>
                </div>
              </div>
            </div>
            <table class="table table-hover personal-task">
              <tbody>
                <tr class="zoomtabla">
                  <td>Today</td>
                  <td>
                    web design
                  </td>
                  <td>
                    <span class="badge bg-important">Upload</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>Yesterday</td>
                  <td>
                    Project Design Task
                  </td>
                  <td>
                    <span class="badge bg-success">Task</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>21-10-14</td>
                  <td>
                    Generate Invoice
                  </td>
                  <td>
                    <span class="badge bg-success">Task</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>22-10-14</td>
                  <td>
                    Project Testing
                  </td>
                  <td>
                    <span class="badge bg-primary">To-Do</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>24-10-14</td>
                  <td>
                    Project Release Date
                  </td>
                  <td>
                    <span class="badge bg-primary">To-Do</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>28-10-14</td>
                  <td>
                    Project Release Date
                  </td>
                  <td>
                    <span class="badge bg-primary">To-Do</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>Last week</td>
                  <td>
                    Project Release Date
                  </td>
                  <td>
                    <span class="badge bg-primary">To-Do</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
                    </span>
                  </td>
                </tr>
                <tr class="zoomtabla">
                  <td>last month</td>
                  <td>
                    Project Release Date
                  </td>
                  <td>
                    <span class="badge bg-success">To-Do</span>
                  </td>
                  <td>
                    <span class="profile-ava">
                      <img alt="" class="simple" src="app_core/resources/usrimg/usr001.jpg" >
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


  <!--main content end-->
  <div class="text-center">
    <div class="credits">
      Diseñado por <a href="http://dialcomcr.com/">DIALCOM</a>
    </div>
  </div>
</section>
