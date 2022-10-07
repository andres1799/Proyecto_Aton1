<?php
//ID Paypal 
define("CLIENT_ID", "AcgRCKdG4zAinTF4ap7PgxrxA-oC6lBJONarjmHfkybVgJJJuhAge7ETiLgBBSMiWLXhQfxub6nsK_ou");

//Token Mercado Pago 
define("TOKEN_MP", "APP_USR-912731648734674-091802-1e8a4f27eba5e4d2d366ace97cbe4aef-1200479608");



//Esta moneda es para Paypal
define("CURRENCY", "USD");

//Simbolo de moneda global
define("MONEDA", "$");

//Token de seguridad para los productos
define("KEY_TOKEN", "APR.wqc-124*");


//Constantes para la base de datos
const DB_HOST = "atonstore1.000webhostapp.com";
const DB_NAME = "empresa";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";


define('SITE_LOGO', 'gsflogo.svg');

//URL base del proyecto
define("urlsite","http://atonstore1.000webhostapp.com/Aton_1_7");
const base_url = "http://atonstore1.000webhostapp.com/Aton_1_7";


//Con este inicio de session_start se usa para guardar en el carrito de compras
session_start();

//Sessions para carrito de compras
$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart =count($_SESSION['carrito']['productos']);
}
?>