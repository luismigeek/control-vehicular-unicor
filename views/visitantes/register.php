<?php require 'views/layouts/header_visitantes.php'; ?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Registrar vehículo</li>
  </ol>

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Informacion del vehiculo</div>
      <div class="card-body">
        <form id="registerVehVis" method="POST">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="placa" name="placa" class="form-control" placeholder="Placa" pattern="[A-Za-z0-9]{6}" required="required" autofocus="autofocus">
                  <label for="placa">*       Placa.    Ej: HGF678</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo" pattern="[0-9a-zA-Z\.'\s]{2,30}$">
                  <label for="modelo">       Modelo .  Ej: BOXER 2015</label>
                </div>
              </div>
            </div>
          </div>
          <a class="btn btn-primary btn-block" id="btn_registerVehVis" href="#">Guardar</a>
        </form>

        <div class="text-center mt-3" id="msg_registerVehVis">
        </div>
      </div>
    </div>
  </div>


</div>
<!-- /.container-fluid -->
<?php require 'views/layouts/footer.php'; ?>