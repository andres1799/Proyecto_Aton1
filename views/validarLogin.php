<?php
session_start();

$enlace = mysqli_connect("localhost", "root", "Andres7821", "empresa");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

if (!empty($_SESSION['active'])) {
} else {
    if (!empty($_POST)) {
        $alert = '';
        if (empty($_POST['usuarios']) || empty($_POST['clave'])) {
            $alert = '<div class="alert alert-danger" role="alert">
            Ingrese su usuario y su clave
            </div>';
        } else {
            $user = mysqli_real_escape_string($enlace, $_POST['usuarios']);
            $clave = mysqli_real_escape_string($enlace, $_POST['clave']);
            $query = mysqli_query($enlace, "SELECT usuarios, clave, id_rol FROM usuarios WHERE usuarios = '$user' AND clave = '$clave'");
            $resultado = mysqli_num_rows($query);


            $_SESSION['usuarios'] = $user;
            if ($resultado > 0) {
                $dato = mysqli_fetch_array($query);
                $_SESSION['id_rol'] = $dato['id_rol'];
                if ($dato['id_rol'] == 1) {
                    header("location: ../admin/dashboard/index.php");
                } else {
                    if ($dato['id_rol'] == 2) {
                        header("location: ../admin/dashboard/index.php");
                    } else {
                        if ($dato['id_rol'] == 3) {
                            header("location: index.php");
                        } else {
                            $alert = '<div class="alert alert-danger" role="alert">
                            Usuario o clave o incorrecta
                            </div>';
                        }
                    }
                }
            }

            mysqli_free_result($query);
            mysqli_close($enlace);
        }
    }
}
