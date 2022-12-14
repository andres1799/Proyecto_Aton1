<?php 
include "validarLogin.php";
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300;600&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/ffec4ec2ed.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../assets/css/login.css" />
  <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">

  <title>Iniciar Sesion</title>
</head>

<body class="bg-dark">

  <div id="page-content-wrapper" class="w-100 bg-light-blue">
    <nav class="navbar navbar-expand-lg navbar-light bg-lightit border-bottom">
      <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link text-light" href="index.php">Inicio</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-light" href="#">Sobre Nosotros</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link text-light" href="#">Soporte</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section>
      <div class="row g-0">
        <div class="col-lg-7 d-none d-lg-block">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item img-1 min-vh-100 active">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="font-weight-bold">La m??s potente del mercado</h5>
                  <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                </div>
              </div>
              <div class="carousel-item img-2 min-vh-100">
                <div class="carousel-caption d-none d-md-block">
                  <h5 class="font-weight-bold">Descubre la nueva generaci??n</h5>
                  <a class="text-muted text-decoration-none">Visita nuestra tienda</a>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
        <div class="col-lg-5 bg-dark d-flex flex-column align-items-end min-vh-100">
          <br>
          <br>
          <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
            <h1 class="font-weight-bold mb-4">Bienvenido de vuelta</h1>
            <form class="mb-5" action="" method="post">
              <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label font-weight-bold">Usuario</label>
                <input type="text" class="form-control bg-dark-x border-0" name="usuarios" id="exampleInputEmail1" placeholder="Ingresa tu email" aria-describedby="emailHelp">
              </div>
              <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label font-weight-bold">Contrase??a</label>
                <input type="password" class="form-control bg-dark-x border-0 mb-2" name="clave" placeholder="Ingresa tu contrase??a" id="exampleInputPassword1">
                <a href="" id="emailHelp" class="form-text text-light text-decoration-none">??Has olvidado tu contrase??a?</a>
              </div>
              <div class="alert alert-danger text-center d-none" id="alerta" role="alert"></div>
              <?php echo isset($alert) ? $alert : ''; ?>
              <button type="submit" name="active" class="btn btn-light w-100">Iniciar sesi??n</button>
              
            </form>

            <p class="font-weight-bold text-center text-light">O inicia sesi??n con</p>
            <div class="d-flex justify-content-around">
              <button type="button" class="btn btn-outline-light flex-grow-1 mr-2"><i class="fab fa-google lead mr-2"></i> Google</button>
              <button type="button" class="btn btn-outline-light flex-grow-1 ml-2"><i class="fab fa-facebook-f lead mr-2"></i> Facebook</button>
            </div>
          </div>
          <div class="text-center mb-5 px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
            <p class="d-inline-block mb-5">??Todavia no tienes una cuenta?</p> <a href="registros.php" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="http://localhost/Aton_1_7/assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/Aton_1_7/assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/Aton_1_7/assets/js/scripts.js"></script>
</body>

</html>