<?php require 'views/layouts/header_vigilantes.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">
      Registrar entrada
    </li>
  </ol>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"> Matricula del vehiculo que ingresa</div>
      <div class="card-body">
        <form id="entradaVeh" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <div class="form-label-group">
                  <input type="text" id="placa" name="placa" class="form-control" placeholder=" Ej: DQK084" pattern="[A-Za-z0-9]{6}" required="required">
                  <label for="placa">* Ej: DQK084</label>
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-primary btn-block" id="btn_entradaVeh" href="#">Guardar</a>
        </form>
        <div class="text-center mt-3" id="msg_entradaVeh">
        </div>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>