<?php
    session_start();
    include_once('../../controllers/conexion.php');
 
    if(isset($_POST['editar'])){
        $database = new Database();
        $db = $database->conectar();
        try{
            $id = $_GET['idproducto'];
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $descuento = $_POST['descuento'];
            $stock = $_POST['stock'];

 
            $sql = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio = '$precio', descuento = '$descuento', stock = '$stock' WHERE idproducto = '$id'";
            //if-else statement in executing our query
            $_SESSION['message'] = ( $db->exec($sql) ) ? 'Member updated successfully' : 'Something went wrong. Cannot update member';
 
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
 
        //close connection
        $database = null;
    }
    else{
        $_SESSION['message'] = 'Fill up edit form first';
    }
 
    header('location: productos.php');

?>