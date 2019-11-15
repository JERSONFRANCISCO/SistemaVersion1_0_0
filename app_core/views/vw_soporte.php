<?php

?>
<style type="text/css">
  .drag-drop-item
  {
    touch-action: none;
  }
</style>  
<?php

?>

<style type="text/css">

  .drag-drop-item
  {
    touch-action: none;
  }
</style>
<script>

</script>
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
          <h3 class="page-header"><i class="fa fa-table"></i>AYUDA Y SOPORTE TÉCNICO</h3>
          <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Envía un mensaje al desarrollador!
                </header>
                <div class="panel-body">
                  <div id="wrapper">
                    <div id="content-wrapper" class="d-flex flex-column">
                      <div id="content">
                        <div class="container-fluid" style="background-color: white;">
                          <!-- DataTales Example -->
                          <div class="card shadow mb-4">
                            <div class="card-header py-3">
                             <div class="row">
                              <div class="col-lg-6">
                                <div id="errormessage"></div>
                                <form action="" method="post" role="form" class="contactForm">
                                  <div class="form-group">
                                    <h4>Usuario</h4>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" value="<?php echo $USR_Usuario_Creacion=$_SESSION['USR_nombre']; ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required/>
                                    <div class="validation"></div>
                                  </div>
                                  <div class="form-group">
                                    <h4>Correo</h4>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" value="<?php echo $USR_Usuario_Creacion=$_SESSION['USR_correo']; ?>"  data-rule="email" data-msg="Please enter a valid email" required/>
                                    <div class="validation"></div>
                                  </div>
                                  <div class="form-group">
                                    <h4>Asunto</h4>
                                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Ingresa el asunto" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" required/>
                                    <div class="validation"></div>
                                  </div>
                                  <div class="form-group">
                                    <h4>Mensaje</h4>
                                    <textarea class="form-control" name="message" rows="5" data-rule="required" style="overflow:auto;resize:none" data-msg="Please write something for us" placeholder="Escribe el problema que estas presentando" required></textarea>
                                    <div class="validation"></div>
                                  </div>

                                  <div class="text-center"><button type="submit" class="btn btn-primary btn-lg">Enviar Mensaje</button></div>
                                </form>
                              </div>

                              <div class="col-lg-6">
                                <div class="recent">
                                  <h3>Consideraciones</h3>
                                </div>
                                <div class="">
                                  <p>- El mensaje será enviado por correo a los desarrolladores de DIALCOM.</p>
                                  <p>- El mensaje que sea enviado por este medio, abrirá un ticket el cual podrás ver el avance en el correo que se envíe.</p>
                                  <p>- Solo podrá ingresar texto.</p>

                                </div>
                              </div>

                            </div>
                          </div>

                        </div>
                      </div>
                      <!-- /.container-fluid -->
                    </div>
                    <!-- End of Main Content -->
                  </div>
                  <!-- End of Content Wrapper -->
                </div>

              </div>

            </section>
          </div>
        </div>
      </div>
    </div>



  </section>
</section>


<?php
echo $HTML->html_footer();
?>


</section>
