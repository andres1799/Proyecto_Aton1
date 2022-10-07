<?php

require 'modulos/header.php';
require 'models/conexion.php';


$db1 = new Database1();
$con = $db1->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

$lista_carrito = array();

if($productos != null){
    foreach($productos as $clave => $cantidad){

    $sql = $con->prepare("SELECT idproducto, nombre, descripcion, precio, descuento, $cantidad AS cantidad FROM productos WHERE idproducto=? AND activo=1");
    $sql->execute([$clave]);
    $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
//session_destroy();
}


?>

<body>

    <div class="d-flex" id="content-wrapper">
        <script>
            function CargarContenido(pagina_php,contenedor){
            $("." + contenedor).load(pagina_php);
        }
        </script>

        <?php require("modulos/sidebar.php"); ?>

        <?php require("modulos/navbar.php"); ?>

    <div class="contenedor">

        


        <div class="table-responsive text-center">
            <table class="table table-hover table-striped table-bordered mt-2" id="tbl">
                <thead class="thead-dark">
                    <thead>
                        <tr class="bg-white" style="border: 1px solid red;">
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($lista_carrito == null){
                            echo '<tr><td colspan ="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        } else {
                            $total = 0;
                            foreach($lista_carrito as $producto){
                                $_id = $producto['idproducto'];
                                $nombre = $producto['nombre'];
                                $descripcion = $producto['descripcion'];
                                $precio = $producto['precio'];
                                $descuento = $producto['descuento'];
                                $cantidad = $producto['cantidad'];
                                $precio_desc = $precio - (($precio * $descuento) / 100);
                                $subtotal = $cantidad * $precio_desc;
                                $total += $subtotal;              
                        ?>
                        <tr class="bg-white">
                            <td><?php echo $nombre; ?></td>
                            <td><?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?></td>
                            <td><input type="number" min="1" max="10" step="1" value="<?php echo $cantidad;?>"size="5" id="cantidad_<?php echo $_id; ?>" onchange="actualizaCantidad(this.value, <?php echo $_id; ?>)"></td>
                            <td><div id="subtotal_<?php echo $_id; ?>" name="subtotal[]" ><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div></td>
                            <td><button type="button" id="eliminar" class="btn btn-danger btn-sm" data-id="<?php echo $_id; ?>" data-toggle="modal" data-target="#eliminaModal">Elimiar</button></td>
                        </tr>
                        <?php } ?>
                        <tr class="bg-white">
                            <td colspan="3"></td>
                            <td colspan="2">
                                <h3>Total a pagar</h3><p class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></p>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
            <?php if ($lista_carrito != null) {?>
            <div class="row">
                <div class="col-md-5 offset-md-7 d-grid gap-2">
                    <a href="pago.php" class="btn btn-danger btn-lg">Realizar pago</a>
                </div>
            </div>
            <?php }  ?> 

        </div>


        <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eliminaModalLabel">Alerta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Desea eliminar el producto de la lista?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button id="btn-eliminar"  class="btn btn-danger" name="eliminar" onclick="eliminar()" value="<?php echo $_id; ?>">Eliminar</button>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>

    let eliminaModal = document.getElementById('eliminaModal')
    eliminaModal.addEventListener('show.bs.modal', function(event){
        let button = event.relatedTarget
        let id = button.getAttribute('data-bs-id')
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-eliminar')
        buttonElimina.value = id
    })

    function actualizaCantidad(cantidad, id){
        let url = 'clases/actualizar_carrito.php'
        let formData = new FormData()
        formData.append('action', 'agregar')
        formData.append('idproducto', id)
        formData.append('cantidad', cantidad)

        fetch(url, {
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data =>{
            if(data.ok){
                let divsubtotal = document.getElementById('subtotal_' + id)
                divsubtotal.innerHTML = data.sub

                let total = 0.00
                let list = document.getElementsByName('subtotal[]')

                for(let i = 0; i < list.length; i++){
                    total += parseFloat(list[i].innerHTML.replace(/[$,]/g, ''))
                }
                total = new Intl.NumberFormat('en-US', {
                    minimumFractionDigits: 2
                }).format(total)
                document.getElementById('total').innerHTML = '<?php echo MONEDA; ?>' + total
            }
        })
    }

    function eliminar(){

        let botonElimina = document.getElementById('btn-eliminar')
        let id = botonElimina.value

        let url = 'clases/actualizar_carrito.php'
        let formData = new FormData()
        formData.append('action', 'eliminar')
        formData.append('idproducto', id)

        fetch(url,{
            method: 'POST',
            body: formData,
            mode: 'cors'
        }).then(response => response.json())
        .then(data => {
            if(data.ok) {
                location.reload()
            }
        })
    }

</script>



<?php
include_once 'modulos/footer.php';
?>