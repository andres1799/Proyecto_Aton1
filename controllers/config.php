<?php 
define("KEY_TOKEN", "APR.wqc-124*");
define("MONEDA", "$");
session_start();

const DB_HOST = "localhost";
const DB_NAME = "empresa";
const DB_USER = "root";
const DB_PASSWORD = "";
const DB_CHARSET = "utf8";


define('SITE_LOGO', 'gsflogo.svg');

define("urlsite","http://localhost/Aton_1_7");
const base_url = "http://localhost/Aton_1_7";

$num_cart = 0;
if(isset($_SESSION['carrito']['productos'])){
    $num_cart =count($_SESSION['carrito']['productos']);
}
?>