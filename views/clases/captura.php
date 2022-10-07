<?php 
require '../modulos/header.php';
require '../models/conexion.php';


//Este codigo captura los datos del boton de paypal
$db1 = new Database1();
$con = $db1->conectar();

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

echo '<pre>';
print_r($datos);
echo '</pre>';

if(is_array($datos)){
    //Esta parte de codigo sirve para recibir los datos enviados a traves del boton de paypal
    $id_transaccion = $datos['detalles']['id'];
    $total = $datos['detalles']['purchase_units'][0]['amount']['value'];
    $status = $datos['detalles']['status'];
    $fecha = $datos['detalles']['update_time'];
    $fecha_nueva = date('Y-m-d H:i:s', strtotime($fecha));
    $email = $datos['detalles']['payer']['email_address'];
    $id_cliente = $datos['detalles']['payer']['payer_id'];

    //Esa INSERT se usa para guardar los datos de la transaccion
    $sql = $con->prepare("INSERT INTO compras (id_transaccion, fecha, status, email, id_cliente, total) VALUES(?,?,?,?,?,?)");
    $sql->execute([$id_transaccion, $fecha_nueva, $status, $email, $id_cliente, $total]);
    $id = $con->lastInsertId();

    if( $id > 0) {

        $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;

        if($productos != null){
            foreach($productos as $clave => $cantidad){

                
                $sql = $con->prepare("SELECT idproducto, nombre, descripcion, precio, descuento, $cantidad AS cantidad FROM productos WHERE idproducto=? AND activo=1");
                $sql->execute([$clave]);
                $row_prod = $sql->fetch(PDO::FETCH_ASSOC);
                $precio = $row_prod['precio'];
                $descuento = $row_prod['descuento'];
                $precio_desc = $precio - (($precio * $descuento) / 100);

                //Esta consulta ingresa los datos de los productos comprados a la base de datos
                $sql_insert = $con->prepare("INSERT INTO detalle_compra (id_compra, id_producto, nombre, precio, cantidad) VALUES(?,?,?,?,?)");
                $sql_insert->execute([$id, $clave, $row_prod['nombre'], $precio_desc, $cantidad]);

            }
            //Despues de finalizar y completar la compra se usa unset() para borrar los productos guardados en el carrito de compras
            unset($_SESSION['carrito']);

            //Este include sirve para usar el phpmailer donde se enviaran los datos de compra al correo del cliente
            include 'enviar_email.php';

        }
        
    }
}
