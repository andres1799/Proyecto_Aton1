<?php

class Database {
    private $host = "localhost";
    private $user = "id19606414_root123123";
    private $clave = "q9]R=*N9UA1ff\(m";
    private $nombre_bd = "id19606414_empresa2123";
    private $charset = "utf8";
    
    function conectar(){
    try {
        $conexion = 'mysql:host='.$this->host.';dbname='.$this->nombre_bd.";
        charset=".$this->charset;
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

    
    //$conexion = new mysqli($host,$user,$clave,$bd);
    /*if (mysqli_connect_errno()){
        echo "No se pudo conectar a la base de datos";
        exit();
    }*/
    /*mysqli_select_db($conexion,$bd) or die("No se encuentra la base de datos");
    mysqli_set_charset($conexion,"utf8");*/
?>
