<?php
    $host = "localhost";
    $user = "id19606414_root123123";
    $clave = "q9]R=*N9UA1ff\(m";
    $nombre_bd = "id19606414_empresa2123";
    $charset = "utf8";
    
    try {
        $conexion = 'mysql:host='.$host.';dbname='.$nombre_bd.";charset=".$charset;
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        $pdo = new PDO($conexion, $user, $clave, $options);
        return $pdo;
    } catch (Exception $e){
        echo "Problema con la conexion: ".$e->getMessage();
        exit;
    }
    
    
    

?>