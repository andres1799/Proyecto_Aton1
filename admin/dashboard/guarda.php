<?php

require 'conexion.php';

$db = new Database();
$con = $db->conectar();

$correcto = false;

if (isset($_POST['Id'])) {

    $id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];


    $query = $con->prepare("UPDATE registros SET Id=?, Nombre=?, Apellido=? WHERE Id=?");
    $resultado = $query->execute(array($id, $nombre, $apellido));

    if ($resultado) {
        $correcto = true;
    }
} else {
    $id = $_POST['Id'];
    $nombre = $_POST['Nombre'];
    $apellido = $_POST['Apellido'];

    $query = $con->prepare("INSERT INTO registros (Id, Nombre, Apellido) VALUES (:Id, :Nomb, :Apell)");
    $resultado = $query->execute(array('Id' => $id, 'Nomb' => $nombre, 'Apell' => $apellido));

    if ($resultado) {
        $correcto = true;
        echo $con->lastInsertId();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($correcto) { ?>
                        <h3>Registro guardado</h3>
                    <?php } else { ?>
                        <h3>Error al guardar</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="usuarios.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>