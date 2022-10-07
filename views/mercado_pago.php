<?php 

require './vendor/autoload.php';

MercadoPago\SDK::setAccessToken('APP_USR-912731648734674-091802-1e8a4f27eba5e4d2d366ace97cbe4aef-1200479608');

$preference = new MercadoPago\Preference();

$item = new MercadoPago\Item;
$item->id = '0001';
$item->title = 'Producto CDP';
$item->quantity = 1;
$item->unit_price = 1000.00;
$item->currency_id = "COP";

$preference->items = array($item);

$preference->back_urls = array(
    "success" => "http://localhost/Aton_1_7/views/clases/capturaMP.php",
    "failure" => "http://localhost/Aton_1_7/views/clases/fallo.php"
);

$preference->auto_return = "approved";
$preference->binary_mode = true;

$preference->save();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <h3>Mercado Pago</h3>
    <div class="checkout-btn"></div>
    <script>
        const mp = new MercadoPago('APP_USR-925590d6-58d8-404c-a993-12a03cca2a06', {
            locale: 'es-CO'
        });
        mp.checkout({
            preference: {
                id: '<?php echo $preference->id; ?>'
            },
            render: {
                container: '.checkout-btn',
                label: 'Pagar con MP'
            }
        });
    </script>
    
</body>
</html>