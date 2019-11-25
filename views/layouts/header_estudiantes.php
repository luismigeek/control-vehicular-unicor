<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> <?php echo constant('WEBSITE'); ?> </title>

  <link href="<?php echo constant('URL'); ?>resource/img/logounicor.ico" rel="icon">
  <link href="<?php echo constant('URL'); ?>resource/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo constant('URL'); ?>resource/css/styles.css" rel="stylesheet">
  <link href="<?php echo constant('URL'); ?>resource/datatables/dataTables.bootstrap4.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <a class="navbar-brand mr-1" href="<?php echo constant('URL'); ?>"> <?php echo constant('WEBSITE'); ?> </a>

    <!-- UserName -->
    <div class="navbar-brand d-none d-md-inline-block ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <?php echo $this->usuario; ?>
    </div>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#">Cambiar contraseña</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar sesión</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo constant('URL'); ?>">
          <i class="fas fa-fw fa-home"></i>
          <span>Inicio</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-car"></i>
          <span>Mis vehiculos</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>estudiantes/register">Registrar vehiculo</a>
          <a class="dropdown-item" href="<?php echo constant('URL'); ?>estudiantes/myvehicles">Listar vehiculos</a>
        </div>
      </li>
    </ul>

    <div id="content-wrapper">