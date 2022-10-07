<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css"  rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link href="../assets/css/registro.css" rel="stylesheet">
    <link href="assets/img/logo.png" rel="shortcut icon" type="image/x-icon">

    <title>Registrarse</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-lightit">
        <a class="navbar-brand" href="#">
            <img src="../assets/img/logo.png" width="30" height="30" alt="">
        </a>
        <a class="navbar-brand" href="#">Aton</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-center" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-center" href="#">Sobre Nosotros</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-center" href="#">Soporte</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-center" href="login.php">Iniciar Sesion</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="form__top">
            <h2>Formulario <span>Registro</span></h2>
        </div>
        <form class="form__reg" action="../controllers/registros.php" method="post">
            <input class="input" type="number"name="id" placeholder="  Documento" required autofocus>
            <input class="input" type="text"name="nom" placeholder="  Nombre" required>
            <input class="input" type="text"name="ape" placeholder="  apellido" required>
            <input class="input" type="email"name="cor" placeholder="  Correo" required>
            <input class="input" type="text"name="cel" placeholder="  Celular" required>
            <input class="input" type="text"name="dic" placeholder="  Dirección" required>
            <input class="input" type="text"name="usu" placeholder="  Usuario" required>
            <input class="input" type="text"name="con" placeholder="  Contraseña" required>
            <div class="btn__form">
                <input class="btn__submit" type="submit" value="REGISTRAR">
                <input class="btn__reset" type="reset" value="LIMPIAR">
            </div>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>