<div id="page-content-wrapper" class="w-100 bg-light-blue">
      <nav class="navbar navbar-expand-lg navbar-light bg-lightit border-bottom">
        <div class="container">
          <button class="navbar-toggler" type="button" id="menu-toggle">
            <span class="navbar-toggler-icon"></span>
          </button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link text-light text-center" href="#">Sobre Nosotros</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-light text-center" href="#">Soporte</a>
              </li>

              <!-- Este if valida que haya una sesion de usuario abierta -->
              <?php if(isset($_SESSION['usuarios'])) {

              } else { ?>
              <!-- Si no hay una sesion abierta mostrara esta parte de codigo -->
              <li class="nav-item active">
                <a class="nav-link text-light text-center" href="login.php">Iniciar Sesion</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link text-light text-center" href="registros.php">Registrarse</a>
              </li>
              <?php }?>

              <nav class="navbar">
                <form class="form-inline">
                  <input class="form-control mr-sm-2" type="search" placeholder="Buscar Producto" aria-label="Buscar">
                  <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
                </form>
              </nav>
              <li class="nav-item active">
                <a href="checkout.php" class="nav-link text-light text-center"><i class="fa-solid fa-cart-shopping"></i><span id="num_cart" class="badge bg-secundary"><?php echo $num_cart; ?></span></a>
              </li>

              <!-- Esta parte de codigo muestra el boton del perfil unicamente si hay una sesion de usuario abierta -->
              <?php if(isset($_SESSION['usuarios'])){ ?>
              <div class="dropdown mt-2">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa-solid fa-user lg-dark"></i> <?php echo $_SESSION['usuarios'];?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="perfil.php">Perfil</a>
                  <a href="modulos/salir.php" class="dropdown-item" style="text-decoration: none;">Cerrar Sesion</a>
                </div>
              </div>
              <?php } ?>
            </ul>
          </div>
        </div>
      </nav>
<div id="content" class="container-fluid">
    <section class="py-2">
