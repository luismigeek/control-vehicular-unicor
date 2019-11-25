<?php require 'views/layouts/header_unloged.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
    <li class="breadcrumb-item active">404 Error</li>
  </ol>

  <!-- Page Content -->
  <h1 class="display-1">404</h1>
  <p class="lead">Pagina no encontrada. Puedes
    <a href="javascript:history.back()">ir a la pagina anterior</a>, o
    <a href="#">regresar a inicio</a>.</p>
</div> <!-- /.container-fluid -->

<?php require 'views/layouts/footer.php'; ?>