<?php include_once "includes/headersdas.php";
include "../../controllers/conexion.php";
error_reporting(0);
if($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {
//$id_user = $_SESSION['idUser'];
if(isset($_POST['producto'])){
    $idproducto = $_POST['producto'];
} else {
    $idproducto = 1;
}


$db = new Database();
$con = $db->conectar();
$query1 = $con->prepare("SELECT id_compra, id_producto, nombre, precio, cantidad FROM detalle_compra WHERE id_compra = $idproducto");
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
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                Buscar Producto
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                <div class="form-group">
                                    <input id="producto" class="form-control" type="text" name="producto" placeholder="Ingresa el código o nombre">
                                    <button type="submit" name="agregar" class="btn btn-danger">Buscar</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="container">
            <table class="table table-hover" id="ventas">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Precio total</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($resultado as $datos) : 
                    $precio = $datos['precio'];
                    $cantidad = $datos['cantidad'];
                    $subtotal = $precio * $cantidad;
                    $total += $subtotal;
                    ?>
                    <tr class="bg-white">
                        <td><?php echo $datos['id_compra']; ?></td>
                        <td><?php echo $datos['id_producto']; ?></td>
                        <td><?php echo $datos['nombre']; ?></td>
                        <td><?php echo $datos['precio']; ?></td>
                        <td><?php echo $datos['cantidad']; ?></td>
                        <td><?php echo $subtotal; ?></td>
                    </tr>
                 <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr class="font-weight-bold">
                        <td colspan=3>Total</td>
                        <td><?php echo number_format($total, 2, '.', ','); ?></td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </div>

</div>
<?php include_once "includes/footerdas.php"; ?>

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