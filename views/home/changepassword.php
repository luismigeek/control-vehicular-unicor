<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?php echo constant('WEBSITE'); ?> - Nueva contraseña </title>

  <link href="<?php echo constant('URL'); ?>resource/img/logounicor.ico" rel="icon">
  <link href="<?php echo constant('URL'); ?>resource/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo constant('URL'); ?>resource/css/styles.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-changepassword mx-auto mt-5">
      <div class="card-header">Restablecer contraseña</div>
      <div class="card-body">
        <form id="changepassword" method="POST">
          <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>">

          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="verificacionCode" name="verificacionCode" class="form-control" placeholder="Codigo de verificación" required="required" autofocus="autofocus">
              <label for="verificacionCode">Codigo de verificación</label>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="password" name="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%*?&#.$($)$-$_]|[^\s]){8,16}$" title="Error es_ " placeholder="Contraseña" required="required">
                  <label for="password">* Contraseña</label>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="_password" name="_password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&#.$($)$-$_])([A-Za-z\d$@$!%*?&#.$($)$-$_]|[^\s]){8,16}$" title="Error es_ " placeholder="Confirmar contraseña" required="required">
                  <label for="_password">* Confirmar contraseña</label>
                </div>
              </div>
            </div>
          </div>

          <a class="btn btn-primary btn-block" id="btn_changepassword" href="#">Guardar</a>
        </form>

        <div class="text-center mt-3" id="msg_changepassword">
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo constant('URL'); ?>resource/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL'); ?>resource/js/logica.js"></script>
</body>

</html>