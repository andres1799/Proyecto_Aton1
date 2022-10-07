<d<iv class="d-flex" id="content-wrapper">
    <!-- Sidebar -->
    <div id="sidebar-container" class="bg-light">
      <div class="logo">
        <img src="../../assets/img/logo.png" alt="">
        <h4 class="font-weight-bold mb-0"></h4>
      </div>

      <div class="menu list-group-flush">

        <a href="index.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-shopping-cart"></i> Dashboard</a>
        <a href="config.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-cogs"></i> Configuracion</a>
        <a href="clientes.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-users"></i> Clientes</a>
        <a href="ventas.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-shopping-cart"></i> Ventas</a>
        <a href="productos.php" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fab fa-product-hunt"></i> Productos</a>
      
        <?php
          if($_SESSION['id_rol'] == 1) { ?>
          <a href="usuarios.php" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-user"></i> Usuarios</a>
        <?php } ?>

      </div>
    </div>

