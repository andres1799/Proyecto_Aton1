<?php
$conexion= mysqli_connect("localhost", "root", "", "empresa");

if(isset($_POST['editar_producto'])){

    if(strlen($_POST['nombre']) >=1 && strlen($_POST['descripcion'])  >=1 && strlen($_POST['precio'])  >=1){

    $nombre = trim($_POST['nombre']);
    $correo = trim($_POST['descripcion']);
    $telefono = trim($_POST['precio']);

    $consulta= "INSERT INTO productos (nombre, descripcion, precio)
    VALUES ('$nombre', '$descripcion','$precio')";

    mysqli_query($conexion, $consulta);
    mysqli_close($conexion);

    header('Location: usuarios.php');
  }
}









?>