<?php require 'views/layouts/header_administrativos.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">
      Usuarios regisrados
    </li>
  </ol>

  <!-- DataTables -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Lista de usuarios registrados</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>C.C.</th>
              <th>NOMBRES</th>
              <th>APELLIDOS</th>
              <th>USUARIO</th>
              <th>OCUPACIÓN</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->personas as $item) {
              $persona = new Persona();
              $persona = $item;
              ?>
              <tr>
                <td><?php echo $persona->ID; ?></td>
                <td><?php echo $persona->NOMBRES; ?></td>
                <td><?php echo $persona->APELLIDOS; ?></td>
                <td><?php echo $persona->USUARIO; ?></td>
                <td><?php echo $persona->OCUPACION; ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>