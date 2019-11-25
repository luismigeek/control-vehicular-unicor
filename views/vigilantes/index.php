<?php require 'views/layouts/header_vigilantes.php'; ?>

<div class="container-fluid">
  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo constant('URL'); ?>">Inicio</a>
    </li>
  </ol>

  <!-- Icon Cards-->
  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-12">
      <div class="card text-white bg-warning o-hidden h-100">
        <div class="card-body">
          <div class="card-body-icon">
            <i class="fas fa-fw fa-list"></i>
          </div>
          <div class="mr-5"> <?php echo constant('WEBSITE'); ?> para Vigilantes</div>
        </div>
        <a class="card-footer text-white clearfix small z-1" href="#">
          <span class="float-left">Ver detalles</span>
          <span class="float-right">
            <i class="fas fa-angle-right"></i>
          </span>
        </a>
      </div>
    </div>
  </div>
  <!-- /.container-fluid -->
  <?php require 'views/layouts/footer.php'; ?>