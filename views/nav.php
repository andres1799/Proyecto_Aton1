<?php
require 'controllers/conexion.php';
require 'controllers/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aton">

  <title>Aton</title>

  <!-- Bootstrap Css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Hoja de estilos -->
  <link href="assets/css/estilos.css" rel="stylesheet">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap" rel="stylesheet">

  <!-- Ionic icons -->
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

  <!-- Data Tables css -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />

  <!-- Script jquery -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <!-- Icono -->
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>

<body>

  <div class="d-flex" id="content-wrapper">

    <!-- Sidebar -->
    <div id="sidebar-container" class="bg-light">
      <div class="logo">
        <img src="http://localhost/Aton_1_7/assets/img/logo.png" alt="">
        <h4 class="font-weight-bold mb-0"></h4>
      </div>
      <div class="menu list-group-flush">
        <a href="index.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-house lead mr-2"></i></i> Inicio</a>
        <a href="portatiles.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-laptop mr-2"></i> Portatil</a>
        <a href="monitores.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-desktop lead mr-2"></i> Monitores</a>
        <a href="componentes.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-memory lead mr-2"></i></i> Componentes</a>
        <a href="accesorios.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fa-solid fa-headphones lead mr-2"></i> Accesorios</a>
        <a href="torres.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"> <i class="fa-solid fa-computer lead mr-2"></i> Torre</a>

      </div>
    </div>
    <!-- Fin sidebar -->
    <!-- Page Content -->
    <div id="page-content-wrapper" class="w-100 bg-light-blue">
      <nav class="navbar navbar-expand-lg navbar-light bg-lightit border-bottom">
        <div class="container">
          <br>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link text-light" href="#">Sobre Nosotros</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-light" href="#">Soporte</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-light" href="login.php">Iniciar Sesion</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-light" href="registros.php">Registrarse</a>
              </li>
              <nav class="navbar">
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Buscar Producto" aria-label="Buscar">
                  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                </form>
              </nav>
              <li class="nav-item active">
                <a href="checkout.php" class="nav-link text-light"><i class="fa-solid fa-cart-shopping"></i><span id="num_cart" class="badge bg-secundary"><?php echo $num_cart; ?></span></a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>

      <div id="content" class="container-fluid">
        <section class="py-2">