
<?php

session_start();
include_once('../../controllers/conexion.php');

if (isset($_POST['agregar'])) {
    $database = new Database();
    $db = $database->conectar();
    $database2 = new Database();
    $db2 = $database2->conectar();
    try {

        $sql = $db2->prepare("SELECT `AUTO_INCREMENT` FROM  INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '' AND   TABLE_NAME   = 'productos';");
        $sql->execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
        $sql = null;
        $database2 = null;
        $idauto = $row['AUTO_INCREMENT'];
               

        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $separador = explode('/', $categoria);

        $dirauto = "../../assets/img/".$separador[1]."/".$idauto;
        if (!is_dir($dirauto)) {
            mkdir($dirauto);
        }

        //move_uploaded_file($imagentmp, $dirauto."/".$_FILES['imagen']['name']);


        $query = $db->prepare("INSERT INTO productos (nombre, descripcion, precio, idcategoria) VALUES (?,?,?,?)");
        $query->execute(array($nombre, $descripcion, $precio, $separador[0]));
        $resultado = $query->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $_SESSION['message'] = $e->getMessage();
    }

    //close connection
    $database = null;
} else {
    $_SESSION['message'] = 'Fill up edit form first';
}
header('location: productos.php');
?>