<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?php echo constant('WEBSITE'); ?> - Verificación </title>

  <link href="<?php echo constant('URL'); ?>resource/img/logounicor.ico" rel="icon">
  <link href="<?php echo constant('URL'); ?>resource/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo constant('URL'); ?>resource/css/styles.css" rel="stylesheet">
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Restablecer contraseña</div>
      <div class="card-body">
        <form action="<?php echo constant('URL'); ?>home/verificar" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="verificacionCode" name="verificacionCode" class="form-control" placeholder="Codigo de verificación" required="required" autofocus="autofocus">
              <label for="verificacionCode">Codigo de verificación</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Verificar</button>
        </form>

        <div class="text-center mt-3">
          <?php
          echo $this->msg;
          ?>
        </div>

        <div class="text-center small mt-3">
          Por favor ingrese el codigo de verificación que le fue enviado a su correo electronico para restablecer su contraseña.
        </div>

        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo constant('URL'); ?>home/forgot_password">¿Olvidó su contraseña?</a>
          <a class="d-block small" href="<?php echo constant('URL'); ?>home/register">Registrarse</a>
          <a class="d-block small" href="<?php echo constant('URL'); ?>home/login">Iniciar sesión</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>