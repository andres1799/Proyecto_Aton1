<?php
class Salir{
    public function SalirUser(){
        session_start();
        session_destroy();
        header('location: ../index.php');
    }
}
?>