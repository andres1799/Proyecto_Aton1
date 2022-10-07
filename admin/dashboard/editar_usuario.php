<?php
    session_start();
    include_once('../../controllers/conexion.php');
 
    if(isset($_POST['editar'])){
        $database = new Database();
        $db = $database->conectar();
        try{
            $id = $_GET['Id'];
            $nombre = $_POST['Nombre'];
            $apellido = $_POST['Apellido'];

 
            $sql = "UPDATE registros SET Nombre = '$nombre', Apellido = '$apellido' WHERE Id = '$id'";
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
 
    header('location: usuarios.php');

?>