<?php
  session_start();
  error_reporting(0);
  if($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {
  
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aton">

  <title>Aton</title>

  <!-- Bootstrap Css -->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

  <!-- Hoja de estilos -->
  <link href="../../assets/css/estilos.css" rel="stylesheet">

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
  <link rel="shortcut icon" href="../../assets/img/logo.png" type="image/x-icon">

  <link rel="stylesheet" href="../../assets/js/jquery-ui/jquery-ui.min.css">
  <script src="../../assets/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body>

  <d<iv class="d-flex" id="content-wrapper">

    <!-- Sidebar -->
    <div id="sidebar-container" class="bg-light">
      <div class="logo">
        <img src="../../assets/img/logo.png" alt="">
        <h4 class="font-weight-bold mb-0"></h4>
      </div>

      <div class="menu list-group-flush">

        <a href="index.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-shopping-cart"></i> Dashboard</a>
        <a href="clientes.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-users"></i> Clientes</a>
        <a href="ventas.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-shopping-cart"></i> Ventas</a>
        <a href="productos.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fab fa-product-hunt"></i> Productos</a>
      
        <?php
          if($_SESSION['id_rol'] == 1) { ?>
          <a href="usuarios.php" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-user"></i> Usuarios</a>
        <?php } ?>

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
              <div class="dropdown mt-2">
              <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-user lg-dark"></i> <?php echo $_SESSION['usuarios'];?>
              </button>
              <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item text-center" href="perfil.php">Perfil</a>
                <a href="salir.php" class="dropdown-item text-center" style="text-decoration: none;">Cerrar Sesion</a>
              </div>
            </div>
            </ul>
          </div>
        </div>
      </nav>

      <div id="content" class="container-fluid">
        <section class="py-2">
<?php
      } else {
        echo 'No tienes acceso';
        error_reporting(0);
        session_destroy();
      }
?>