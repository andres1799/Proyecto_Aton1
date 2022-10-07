<?php include_once "includes/headersdas.php";
include "../../controllers/conexion.php";
define("MONEDA", "$");

if($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {

$db = new Database();
$con = $db->conectar();
$query1 = $con->prepare("SELECT PR.idproducto, PR.nombre, PR.descripcion, PR.precio, PR.descuento, PR.activo, CT.categoria, PR.stock, PR.imagen FROM productos as PR INNER JOIN categorias as CT ON CT.idcategoria = PR.idcategoria");
$query1->execute();
$resultado = $query1->fetchAll(PDO::FETCH_ASSOC);

?>

 <button class="btn btn-success" type="button" data-toggle="modal" data-target="#agregarModal"> <i class="fas fa-plus"></i></button>
 <?php include_once('agregarProductoModal.php'); ?>



<h1 class="text-dark text-center mt-3">Tabla de usuarios</h1>
<div class="container">
    <div class="card">
        <div class="card-body">
            <table id="excel" class="display">
                <thead>
                    <tr>
                        <th>#</th>
                         <th>Nombre</th>
                         <th>Precio</th>
                         <th>Descuento</th>
                         <th>Stock</th>
                         <th>Categoria</th>
                         <th>Imagen</th>
                         <th></th>
                         <th></th>
                    </tr>
                </thead>
                
                <tbody>
                     <?php foreach ($resultado as $datos) : 
                     $imagen = "../../assets/img/" .$datos['categoria']."/".$datos['idproducto']."/".$datos['imagen'];
                        if (!file_exists($imagen)) {
                            $imagen = "../../assets/img/no-photo.jpg";
                    }
                    ?>
                         <tr class="bg-white">
                             <td><?php echo $datos['idproducto']; ?></td>
                             <td><?php echo $datos['nombre']; ?></td>
                             <td><?php echo MONEDA . number_format($datos['precio'], 2, '.', ','); ?></td>
                             <td><?php echo $datos['descuento']; ?></td>
                             <td><?php echo $datos['stock']; ?></td>
                             <td><?php echo $datos['categoria']; ?></td>
                             <td><img src="<?php echo $imagen; ?>" width="50" heigth="70"> </td>
                             <td><button type="button" data-target="#editarModal<?php echo $datos['idproducto']; ?>" data-toggle="modal" class="btn btn-warning">Editar</button></td>
                             <td><button type="button" data-target="#eliminaModalP<?php echo $datos['idproducto']; ?>" data-toggle="modal" class="btn btn-danger">Eliminar</button></td>
        
                             </td>
                         </tr>
                         <?php include('editarProductoModal.php'); ?>
                         <?php include('eliminarProductoModal.php'); ?>
                         
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
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ]
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