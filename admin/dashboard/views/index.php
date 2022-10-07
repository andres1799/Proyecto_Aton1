<?php

session_start();

$nombreuser = $_SESSION['usuarios'];



$enlace = mysqli_connect("localhost", "id19606414_root123123", "q9]R=*N9UA1ff\(m", "id19606414_empresa2123");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$usuarios = mysqli_query($enlace, "SELECT * FROM usuarios");
$totalU = mysqli_num_rows($usuarios);

$productos = mysqli_query($enlace, "SELECT * FROM productos");
$totalP = mysqli_num_rows($productos);


$validar = $_SESSION['usuarios'];
if ($validar == null || $validar = '') {

    echo "No tienes acceso";
    die();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Aton">

    <title>Aton</title>

    <!-- Bootstrap Css -->
    <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Hoja de estilos -->
    <link href="../../../assets/css/estilos.css" rel="stylesheet">

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
    <link rel="shortcut icon" href="../../../assets/img/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="../../../assets/js/jquery-ui/jquery-ui.min.css">
    <script src="../../../assets/js/all.min.js" crossorigin="anonymous"></script>

</head>

<body>
    <!-- Sidebar -->
    <div class="d-flex" id="content-wrapper">
        <div id="sidebar-container" class="bg-light">
            <?php
            include "modulos/sidebar.php";
            ?>
        </div>

        <!-- Navbar -->
        <div id="page-content-wrapper" class="w-100 bg-light-blue">
            <?php
            include "modulos/navbar.php";
            ?>
            <!--Contenido -->
            <div id="contenedor">
                <?php include "dashboard.php"; ?>
            </div>




            <!-- Footer -->
            <?php include_once "../includes/footerdas.php"; ?>

            <?php mysqli_close($enlace); ?>

            <script>
                function CargarContenido(pagina_php,contenedor){
                $("#" + contenedor).load(pagina_php);
                }
            </script>