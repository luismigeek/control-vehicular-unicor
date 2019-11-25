<?php require 'views/layouts/header_administrativos.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">
      Horas ingreso
    </li>
  </ol>

  <!-- DataTables -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Reporte de las horas en las que entraron más vehiculos</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Hora (24h)</th>
              <th>Cantidades</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($this->list_vehicles as $item) {
              ?>
              <tr>
              <td><?php echo $item['HORA']; ?></td>
              <td><?php echo $item['CANT']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>