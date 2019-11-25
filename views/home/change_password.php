<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?php echo constant('WEBSITE'); ?> - Verificación</title>

  <link href="<?php echo constant('URL'); ?>resource/img/logounicor.ico" rel="icon">
  <link href="<?php echo constant('URL'); ?>resource/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo constant('URL'); ?>resource/css/styles.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Restablecer contraseña</div>
      <div class="card-body">
        <form action="<?php echo constant('URL'); ?>home/guardar_contraseña" method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%*?&#.$($)$-$_]|[^\s]){8,16}$" title="Error es_ " placeholder="Nueva contraseña" required="required">
              <label for="password"> Nueva contraseña</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="password" name="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%*?&#.$($)$-$_]|[^\s]){8,16}$" title="Error es_ " placeholder=Confirmar"nueva contraseña" required="required">
              <label for="password">Confirmar nueva contraseña</label>
            </div>
          </div>

          <button type="submit" class="btn btn-primary btn-block">Guardar</button>
        </form>

        <div class="text-center mt-3">
          <?php
          echo $this->msg;
          ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>