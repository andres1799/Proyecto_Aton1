<?php include_once "includes/headersdas.php";
include "../../controllers/conexion.php";
error_reporting(0);
if($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {
//$id_user = $_SESSION['idUser'];


$db = new Database();
$con = $db->conectar();
$query1 = $con->prepare("SELECT id_transaccion, fecha, status, email, id_cliente, total FROM compras");
$query1->execute();
$resultado = $query1->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label><i class="fas fa-user"></i> VENDEDOR</label>
                            <p style="font-size: 16px; text-transform: uppercase; color: red;"><?php echo $_SESSION['usuarios']; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <table class="table table-hover" id="ventas">
                <thead class="thead-dark">
                    <tr>
                        <th>id_transaccion</th>
                        <th>Fecha</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>id_cliente</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($resultado as $datos) : ?>
                    <tr class="bg-white">
                        <td><?php echo $datos['id_transaccion']; ?></td>
                        <td><?php echo $datos['fecha']; ?></td>
                        <td><?php echo $datos['status']; ?></td>
                        <td><?php echo $datos['email']; ?></td>
                        <td><?php echo $datos['id_cliente']; ?></td>
                        <td><?php echo $datos['total']; ?></td>
                    </tr>
                 <?php endforeach ?>
                </tbody>
            </table>

        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
    $('#ventas').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5, 6 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 5, 6 ]
                }
            },
        ]
    } );
} );
</script>

<?php include_once "includes/footerdas.php"; ?>

<?php
      } else {
        error_reporting(0);
        echo "<br>";
        echo "<a href='../../views/'>Volver al inicio</a>";
        session_destroy();
      }
?>