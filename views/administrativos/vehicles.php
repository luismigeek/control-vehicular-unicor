<?php require 'views/layouts/header_administrativos.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">
      Vehiculos regisrados
    </li>
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
              <th>MATRICULA</th>
              <th>MODELO</th>
              <th>DUEÑO</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($this->vehiculos as $item) {
              ?>
              <tr>
              <td><?php echo $item['MATRICULA']; ?></td>
              <td><?php echo $item['MODELO']; ?></td>
              <td><?php echo $item['DUENO']; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>