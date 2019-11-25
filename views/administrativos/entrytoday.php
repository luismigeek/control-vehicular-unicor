<?php require 'views/layouts/header_administrativos.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">
      Vehiculos que entraron hoy
    </li>
  </ol>

  <!-- DataTables -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Reporte de vehiculos que entraron en día de hoy</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Placa</th>
              <th>Modelo</th>
              <th>Tiempo dentro del campus</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->list_vehicles as $item) {
              $vehiculo = new Vehiculo();
              $vehiculo = $item;
              ?>
              <tr>
                <td><?php echo $vehiculo->placa; ?></td>
                <td><?php echo $vehiculo->modelo; ?></td>
                <td><?php echo $vehiculo->time; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>