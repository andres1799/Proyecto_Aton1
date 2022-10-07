<?php include_once "includes/headersdas.php";
include "../../controllers/conexion.php";

if($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {

$db = new Database();
$con = $db->conectar();

$query = $con->prepare("SELECT US.Id, US.id_rol, US.Nombre, US.Apellido, US.usuarios, RL.rol FROM usuarios as US INNER JOIN rol as RL ON RL.idrol = US.id_rol");
$query->execute();
$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<h1 class="text-dark text-center mt-3">Tabla de usuarios</h1>
<div class="container ">
    <div class="card">
        <div class="card-body">
            <table id="excel" class="display">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Rol</th>
                        <th>Usuarios</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                
                <tbody>
                <?php foreach ($resultado as $datos) : ?>
                    
                        <tr>
                            <td><?php echo $datos['Id']; ?></td>
                            <td><?php echo $datos['Nombre']; ?></td>
                            <td><?php echo $datos['Apellido']; ?></td>
                            <td><?php echo $datos['rol']; ?></td>
                            <td><?php echo $datos['usuarios']; ?></td>
                            <td><button type="button" data-target="#editarUsuarioModal<?php echo $datos['Id']; ?>"  data-toggle="modal"  class="btn btn-warning">Editar</button></td>
                            <td><button type="button" data-target="#eliminaModal<?php echo $datos['Id']; ?>" data-toggle="modal" class="btn btn-danger">Eliminar</button></td> 
                            
                        </tr>
                        <?php include_once('usuarioRolModal.php'); ?>
                        <?php include('editarUsuarioModal.php'); ?>
                        <?php include('eliminarUsuarioModal.php'); ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#excel').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4 ]
                }
            },
        ]
    } );
} );
</script>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#content-wrapper").toggleClass("toggled");
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
<?php
      } else {
        error_reporting(0);
        echo "<br>";
        echo "<a href='../../views/'>Volver al inicio</a>";
        session_destroy();
      }
?>