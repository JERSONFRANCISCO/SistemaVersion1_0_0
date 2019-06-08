  <div class="container">

    <form class="login-form" action="index.php" method="POST">
      <div class="login-wrap">
        <p class="login-img"><i class="icon_lock_alt"></i></p>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_profile"></i></span>
          <input type="text" class="form-control" id="TXTuser" name="TXTuser" placeholder="Usuario" autofocus required="true">
        </div>
        <div class="input-group">
          <span class="input-group-addon"><i class="icon_key_alt"></i></span>
          <input type="password" id="TXTpassword" name="TXTpassword" class="form-control" placeholder="Clave">
        </div>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Recordarme
          <span class="pull-right"> <a href="#"> Olvidó la clave?</a></span>
        </label>
        <button class="btn btn-primary btn-lg btn-block" name="login" id="login" type="submit">Ingresar</button>
        <button class="btn btn-info btn-lg btn-block" type="submit">Registrarse</button>
      </div>
    </form>
    <div class="text-right">
      <div class="credits">
        Diseñado por <a href="http://dialcomcr.com/">DIALCOM</a>
      </div>
    </div>
  </div>