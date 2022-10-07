<?php

require "../../controllers/conexion.php";

$db = new Database();
$con = $db->conectar();
$id = $_GET['idproducto'];
$query = $con->prepare("DELETE FROM productos where idproducto=?");
if($query->execute([$id])){
    echo 'Registro eliminado';
} else {
    echo 'Error al eliminar';
}

header('location: productos.php')

?>
