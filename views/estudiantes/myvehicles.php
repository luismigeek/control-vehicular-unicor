<?php require 'views/layouts/header_estudiantes.php'; ?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Mis vehículos</li>
  </ol>

  <!-- DataTables -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Lista de vehiculos registrados</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Placa</th>
              <th>Modelo</th>
              <th style="width: 30%">Opciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->vehiculos as $item) {
              $vehiculo = new Vehiculo();
              $vehiculo = $item;
              ?>
              <tr>
                <td><?php echo $vehiculo->placa; ?></td>
                <td><?php echo $vehiculo->modelo; ?></td>
                <td>
                  <a href="<?php echo constant('URL') . 'estudiantes/details/?mla=' . $vehiculo->placa . '&mdl=' . $vehiculo->modelo; ?>" class="btn btn-warning fa-xs ope">
                    <span class="fas fa-pen"></span> <i class="btn-text">Editar</i>
                  </a>
                  <a href="<?php echo constant('URL') . 'estudiantes/delete/?mla=' . $vehiculo->placa; ?>" class="btn btn-danger fa-xs ope">
                    <span class="fas fa-trash"> </span> <i class="btn-text">Eliminar</i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>