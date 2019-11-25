<?php require 'views/layouts/header_estudiantes.php'; ?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>estudiantes/myvehicles">Mis vehículos</a>
    </li>
    <li class="breadcrumb-item">
      Eliminar vehículo
    </li>
  </ol>


  <div class="modal-content">

    <div class="modal-header">
      <h5 class="modal-title">¿Eliminar vehiculo con placas <?php echo $_SESSION['RM_PLACA']; ?>?</h5>
    </div>

    <div class="modal-body">Seleccione "Eliminar" si deseas confirmar ésta acción.</div>

    <div class="modal-footer">
      <button class="btn btn-secondary" type="button">Cancelar</button>
      <a class="btn btn-primary" href="<?php echo constant('URL'); ?>estudiantes/eliminar">Eliminar</a>
    </div>
  </div>

  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>