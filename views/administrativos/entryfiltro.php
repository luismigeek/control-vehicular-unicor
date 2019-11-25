<?php require 'views/layouts/header_administrativos.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">
      Historial
    </li>
  </ol>

  <!-- DataTables -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Reporte de entradas y salidas</div>
    <div class="card-body">
      <div class="table-responsive">

        <form id="form_filtro">
          <label for="inicio">
            Fecha inicio: <input type="datetime-local" class="form-control" name="inicio" id="inicio">
          </label>
          <label for="final">
            Fecha final: <input type="datetime-local" class="form-control" name="final" id="final">
          </label>

          <button type="button" class="btn btn-info" id="filtrar">Filtrar</button>
        </form>
        <br>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Placa</th>
              <th>Modelo</th>
              <th>Hora de entrada</th>
              <th>Hora de salida</th>
            </tr>
          </thead>
          <tbody id="tbody">
          <?php foreach ($this->historial as $item) {
              $vehiculo = new Vehiculo();
              $vehiculo = $item;
              ?>
              <tr>
                <td><?php echo $vehiculo->placa; ?></td>
                <td><?php echo $vehiculo->modelo; ?></td>
                <td><?php echo $vehiculo->entrada; ?></td>
                <td><?php echo $vehiculo->salida; ?></td>
              </tr>
            <?php } ?>          
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>