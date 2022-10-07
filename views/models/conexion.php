<?php

class Database1 {
    private $host = "localhost";
    private $user = "root";
    private $clave = "Andres7821"; //q9]R=*N9UA1ff\(m 
    private $nombre_bd = "empresa";
    private $charset = "utf8";
    
    function conectar(){
    try {
        $conexion = 'mysql:host='.$this->host.';dbname='.$this->nombre_bd.";charset=".$this->charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($conexion, $this->user, $this->clave, $options);
        return $pdo;
    } catch (Exception $e){
        echo "Problema con la conexion: ".$e->getMessage();
        exit;
    }
    }
}
?>
