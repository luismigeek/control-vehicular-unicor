<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?php echo constant('WEBSITE'); ?> - Registrarse</title>

  <link href="<?php echo constant('URL'); ?>resource/img/logounicor.ico" rel="icon">
  <link href="<?php echo constant('URL'); ?>resource/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo constant('URL'); ?>resource/css/styles.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Registro</div>
      <div class="card-body">
        <form id="register" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstnames" name="firstnames" class="form-control" placeholder="Nombre (s)" pattern="[a-zA-Z\.'\s]{2,30}" required="required" autofocus="autofocus">
                  <label for="firstnames">* Nombre (s)</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastnames" name="lastnames" class="form-control" placeholder="Apellidos" pattern="[a-zA-Z\.'\s]{2,30}$" required="required">
                  <label for="lastnames">* Apellidos</label>
                </div>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="username" name="username" class="form-control" placeholder="Username" pattern="[a-zA-Z0-9]{5,12}$" required="required">
                  <label for="username">* Nombre de usuario</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="dni" name="dni" class="form-control" pattern="[0-9]{7,10}" placeholder="Número de documento" required="required">
                  <label for="dni">* Número de documento</label>
                </div>
              </div>
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
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" name="email" class="form-control" placeholder="Correo electronico" required="required" autofocus="autofocus" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
              <label for="email">Correo electronico</label>
            </div>
          </div>

          <div class="form-group">
            <fieldset>
              <legend>Ocupacion</legend>
              <label for="opc1">
                <input type="radio" name="ocupation" id="opc1" value="estudiante" checked>
                Estudiante
              </label><br>
              <label for="opc2">
                <input type="radio" name="ocupation" id="opc2" value="vigilante">
                Vigilante
              </label><br>
              <label for="opc3">
                <input type="radio" name="ocupation" id="opc3" value="visitante">
                Visitante
              </label><br>
              <label for="opc4">
                <input type="radio" name="ocupation" id="opc4" value="administrativo">
                Administrativo
              </label><br>
            </fieldset>
          </div>
          <a class="btn btn-primary btn-block" id="btn_register" href="#">Registrar</a>
        </form>

        <div class="text-center" id="msg_register">

        </div>

        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo constant('URL'); ?>home/login">Iniciar sesión</a>
          <a class="d-block small" href="<?php echo constant('URL'); ?>home/forgot_password">¿Olvidó su contraseña?</a>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo constant('URL'); ?>resource/jquery/jquery.min.js"></script>
  <script src="<?php echo constant('URL'); ?>resource/js/logica.js"></script>
</body>

</html>