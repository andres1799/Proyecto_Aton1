<?php
require "conexion.php";
$nombre = $_POST['nom'];
$apellido = $_POST['ape'];
$celular = $_POST['cel'];
$correo = $_POST['cor'];
$contrasena = md5($_POST['con']);
$Usuario = $_POST['usu'];
$direccion = $_POST['dic'];
$documento = $_POST['id'];

$db = new Database();
$con = $db->conectar();
$query = $con->prepare("INSERT INTO usuarios (Id, Nombre, Apellido, usuarios, clave, Direccion, Celular, Correo) VALUES (?,?,?,?,?,?,?,?)");
$query->execute(array($documento, $nombre, $apellido, $Usuario, $contrasena, $direccion, $celular, $correo));
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
echo "<script>alert('Usuario registrado')</script>";

header('location: ../index.php ')
?>
