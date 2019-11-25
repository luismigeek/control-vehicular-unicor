<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?php echo constant('WEBSITE'); ?> - Iniciar sesion </title>

  <link href="<?php echo constant('URL'); ?>resource/img/logounicor.ico" rel="icon">
  <link href="<?php echo constant('URL'); ?>resource/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo constant('URL'); ?>resource/css/styles.css" rel="stylesheet">

</head>

<body class="bg-dark">
  <div> <?php echo $this->action; ?></div>
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Iniciar sesión</div>
      <div class="card-body">
        <form id="login" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="username" name="username" class="form-control" placeholder="Nombre de usuario" required="required" autofocus="autofocus">
              <label for="username">Nombre de usuario</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required="required">
              <label for="password">Contraseña</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Recordar contraseña
              </label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" id="btn_login" href="#">Iniciar</a>
        </form>

        <div class="text-center mt-3" id="msg_login">

        </div>

        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo constant('URL'); ?>home/register">Regristrarse</a>
          <a class="d-block small" href="<?php echo constant('URL'); ?>home/forgot_password">¿Olvidó su contraseña?</a>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo constant('URL'); ?>resource/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL'); ?>resource/js/logica.js"></script>

</body>

</html>