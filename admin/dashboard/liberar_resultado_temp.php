<?php
session_start();

$enlace = mysqli_connect("127.0.0.1", "root", "", "empresa");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
$query2 = mysqli_query($enlace, "SELECT PR.idproducto, CT.categoria FROM productos as PR INNER JOIN categorias as CT ON CT.idcategoria = PR.idcategoria");

mysqli_free_result($query2);

mysqli_close($enlace);