<?php include_once "includes/headersdas.php";
$host = "localhost";
$user = "root";
$clave = "";
$bd = "empresa";
$conexion = mysqli_connect($host,$user,$clave,$bd);
if (mysqli_connect_errno()){
    echo "No se pudo conectar a la base de datos";
    exit();
}
mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
mysqli_set_charset($conexion,"utf8");


$id = $_GET['Id'];
$sqlpermisos = mysqli_query($conexion, "SELECT * FROM permisos");
$usuarios = mysqli_query($conexion, "SELECT * FROM registros WHERE Id = $id");
$consulta = mysqli_query($conexion, "SELECT * FROM detalle_permisos WHERE id_usuario = $id");
$resultUsuario = mysqli_num_rows($usuarios);
if (empty($resultUsuario)) {
    header("Location: usuarios.php");
}
$datos = array();
foreach ($consulta as $asignado) {
    $datos[$asignado['id_permiso']] = true;
}
if (isset($_POST['permisos'])) {
    $id_user = $_GET['Id'];
    $permisos = $_POST['permisos'];
    mysqli_query($conexion, "DELETE FROM detalle_permisos WHERE id_usuario = $id_user");
    if ($permisos != "") {
        foreach ($permisos as $permiso) {
            $sql = mysqli_query($conexion, "INSERT INTO detalle_permisos(id_usuario, id_permiso) VALUES ($id_user,$permiso)");
            if ($sql == 1) {
                header("Location: rol.php?id=".$id_user."&m=si");
            } else {
                $alert = '<div class="alert alert-primary" role="alert">
                            Error al actualizar permisos
                        </div>';
            }
        }
    }
}
?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header bg-warning text-white">
                Permisos
            </div>
            <div class="card-body">
                <form method="post" action="">
                    <?php if(isset($_GET['m']) && $_GET['m'] == 'si') { ?>
                        <div class="alert alert-success" role="alert">
                            Permisos actualizado
                        </div>

                    <?php } ?>
                    <?php while ($row = mysqli_fetch_assoc($sqlpermisos)) { ?>
                        <div class="form-check form-check-inline m-4">
                            <label for="permisos" class="p-2 text-uppercase"><?php echo $row['permiso']; ?></label>
                            <input id="permisos" type="checkbox" name="permisos[]" value="<?php echo $row['idpermiso']; ?>" <?php
                            if (isset($datos[$row['idpermiso']])) {
                                echo "checked";
                                 }?>>
                        </div>
                    <?php } ?>
                    <br>
                    <button class="btn btn-primary btn-block" type="submit">Modificar</button>
                </form>
            </div>
        </div>
    </div>
</div>
