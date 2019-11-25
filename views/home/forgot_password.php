<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title> <?php echo constant('WEBSITE'); ?> - Recuperar contraseña</title>

  <link href="<?php echo constant('URL'); ?>resource/img/logounicor.ico" rel="icon">
  <link href="<?php echo constant('URL'); ?>resource/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo constant('URL'); ?>resource/css/styles.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Restablecer contraseña</div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>¿Olvidadó su contraseña?</h4>
          <p>Ingrese su Email y le enviaremos las instrucciones para restablecer su contraseña.</p>
        </div>
        <form id="forgot_password" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Ingrese su correo electrónico" required="required" autofocus="autofocus">
              <label for="inputEmail">Ingrese su correo electronico</label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" id="btn_forgot_password" href="#">Restablecer contraseña</a>
        </form>

        <div class="text-center mt-3" id="msg_forgot_password">
        </div>

        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo constant('URL'); ?>home/register">Registrarse</a>
          <a class="d-block small" href="<?php echo constant('URL'); ?>home/verification">Tengo un codigo de verificación</a>
          <a class="d-block small" href="<?php echo constant('URL'); ?>home/login">Iniciar sesión</a>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo constant('URL'); ?>resource/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL'); ?>resource/js/logica.js"></script>
</body>

</html>