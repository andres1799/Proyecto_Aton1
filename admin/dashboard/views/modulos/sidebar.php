<div id="sidebar-container" class="bg-light">
  <div class="logo">
    <img src="../../../assets/img/logo.png" alt="">
    <h4 class="font-weight-bold mb-0"></h4>
  </div>

  <div class="menu list-group-flush">

    <a style="cursor: pointer;" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0" onclick="CargarContenido('views/dashboard.php','contenedor')"><i class="fas fa-shopping-cart"></i> Dashboard</a>
    <a style="cursor: pointer;" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0" onclick="CargarContenido('vistas/config.php','contenedor')"><i class="fas fa-cogs"></i> Configuracion</a>
    <a style="cursor: pointer;" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0" onclick="CargarContenido('vistas/clientes.php','contenedor')"><i class="fas fa-users"></i> Clientes</a>
    <a style="cursor: pointer;" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0" onclick="CargarContenido('vistas/ventas.php','contenedor')"><i class="fas fa-shopping-cart"></i> Ventas</a>
    <a href="../productos.php" style="cursor: pointer;" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fab fa-product-hunt"></i> Productos</a>
    
    <?php
    if($_SESSION['id_rol'] == 1) { ?>
    <a href="../usuarios.php" id="nav" class="list-group-item list-group-item-action text-light bg-light p-3 border-0"><i class="fas fa-user"></i> Usuarios</a>
    <?php } ?>
  </div>
</div>

