<?php

require "../../controllers/conexion.php";

$db = new Database();
$con = $db->conectar();
$id = $_GET['Id'];
$query = $con->prepare("DELETE FROM registros where Id=?");
if($query->execute([$id])){
    echo 'Registro eliminado';
} else {
    echo 'Error al eliminar';
}

header('location: usuarios.php')

?>

