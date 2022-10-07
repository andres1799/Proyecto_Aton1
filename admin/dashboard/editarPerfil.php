<?php
$enlace = mysqli_connect("localhost", "id19606414_root123123", "q9]R=*N9UA1ff\(m", "id19606414_empresa2123");



$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
$clave = md5($_POST['contrasena']);
$usuario = $_POST['usuario'];
$direccion = $_POST['direccion'];
$id = $_POST['id'];

$db = new Database();
$con = $db->conectar();
$query = $con->prepare("UPDATE usuarios SET Nombre= :nombre, Apellido= :apellido, usuarios= :usuario, clave= :clave, Direccion= :direccion, Celular= :celular, Correo= :correo WHERE id= :id;") ;

$sentencia->bindParam(':id',$id);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':apellido',$apellido);
$sentencia->bindParam(':usuario',$usuario);
$sentencia->bindParam(':clave',$clave);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':correo',$correo);

if($sentencia->execute()){
    return header("Locaion: perfil.php");
}

else{
    return "Error";
}
?>