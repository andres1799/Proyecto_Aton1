<?php
require 'modulos/header.php';
require 'models/conexion.php';
require 'vendor/autoload.php';

MercadoPago\SDK::setAccessToken(TOKEN_MP);

$preference = new MercadoPago\Preference();
$porductos_mp = array();



$db1 = new Database1();
$con = $db1->conectar();

$productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;




$lista_carrito = array();

if ($productos != null || $productos != "") {
    foreach ($productos as $clave => $cantidad) {

        $sql = $con->prepare("SELECT idproducto, nombre, descripcion, precio, descuento, $cantidad AS cantidad FROM productos WHERE idproducto=? AND activo=1");
        $sql->execute([$clave]);
        $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
    }
} else {
    header("Location: ./index.php");
    exit;
}

?>

<body>

    <div class="d-flex" id="content-wrapper">
        <script>
            function CargarContenido(pagina_php, contenedor) {
                $("." + contenedor).load(pagina_php);
            }
        </script>

        <?php require("modulos/sidebar.php"); ?>

        <?php require("modulos/navbar.php"); ?>

        <div class="contenedor">
            <div class="table-responsive text-center">
                <table class="table table-hover table-striped table-bordered mt-2" id="tbl">
                    <div class="col-6">
                        <h4>Detalle de pago</h4>
                    </div>
                    <thead class="thead-dark">
                        <tr class="bg-white" style="border: 1px solid red;">
                            <th>Producto</th>
                            <th>Subtotal</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($lista_carrito == null) {
                            echo '<tr><td colspan ="5" class="text-center"><b>Lista vacia</b></td></tr>';
                        } else {
                            $total = 0;
                            foreach ($lista_carrito as $producto) {
                                $_id = $producto['idproducto'];
                                $nombre = $producto['nombre'];
                                $descripcion = $producto['descripcion'];
                                $precio = $producto['precio'];
                                $descuento = $producto['descuento'];
                                $cantidad = $producto['cantidad'];
                                $precio_desc = $precio - (($precio * $descuento) / 100);
                                $subtotal = $cantidad * $precio_desc;
                                $total += $subtotal;
                                
                                

                                $item = new MercadoPago\Item;
                                $item->id = $_id;
                                $item->title = $nombre;
                                $item->quantity = $cantidad;
                                $item->unit_price = $precio_desc;
                                $item->currency_id = "COP";

                                array_push($porductos_mp, $item);
                                unset($item);


                        ?>
                                <tr class="bg-white">
                                    <td><?php echo $nombre; ?></td>
                                    <td>
                                        <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]"><?php echo MONEDA . number_format($subtotal, 2, '.', ','); ?></div>
                                    </td>
                                </tr>
                            <?php } 
                            $precio_dolar = intdiv($total, 4400);
                            //print_r($precio_dolar);

                            ?>

                            
                            <tr class="bg-white">
                                <td colspan="2">
                                    <h3 class="h3" id="total"><?php echo MONEDA . number_format($total, 2, '.', ','); ?></h3>
                                </td>
                            </tr>
                    </tbody>
                <?php } ?>
                </table>
                <div id="paypal-button-container"></div>
                <div class="checkout-btn"></div>
            </div>
        </div>
<?php
//Validaciones para el boton de pago con Mercado Pago  
$preference->items = $porductos_mp;
$preference->back_urls = array(
    "success" => "clases/capturaMP.php",
    "failure" => "clases/fallo.php"
);

$preference->auto_return = "approved";
$preference->binary_mode = true;

$preference->save();

?>

        
<script>
    //Inicio del boton de pago paypal
    paypal.Buttons({
        style:{
            color: 'blue',
            shape: 'pill',
            label: 'pay'
        },
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: <?php echo $precio_dolar; ?> 
                    }
                }]
            });

        },
        onApprove: function(data, actions){
            let URL = 'clases/captura.php'
            actions.order.capture().then(function(detalles) {
                
                console.log(detalles)

                let url = 'clases/captura.php'

                return fetch(url, {
                    method: 'post',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        detalles: detalles
                    })
                 }).then(function(response){
                    window.location.href = "completado.php?key=" + detalles['id'];  
                 })
            });
        },

        onCancel: function(data){
            alert("Pago Cancelado");
            console.log(data); 
        }
    }).render('#paypal-button-container')
    //Fin del boton de pago paypal

    //Boton de pago para Mercado Pago
    const mp = new MercadoPago('APP_USR-925590d6-58d8-404c-a993-12a03cca2a06', {
            locale: 'es-CO'
        });
        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout-btn',
                label: 'Pagar con Mercado Pago'
            }
        });


</script>

<?php
    include_once 'modulos/footer.php';
?>
