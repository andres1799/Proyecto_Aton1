<?php
class Consultas {
    private $host = "localhost";
    private $user = "root";
    private $clave = "";
    private $nombre_bd = "empresa";
    private $charset = "utf8";
    private $pdo;

    public function __construct() {
        try {
            $conexion = 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_bd . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $this->pdo = new PDO($conexion, $this->user, $this->clave, $options);
            return $this->pdo;
        } catch (Exception $e) {
            echo "Problema con la conexion: " . $e->getMessage();
            exit;
        }
    }

    public function getPortatiles()
    {
        $sql = $this->pdo->prepare("SELECT PR.idproducto, PR.nombre, PR.descripcion, PR.precio, PR.idcategoria, PR.imagen, CT.categoria FROM productos as PR INNER JOIN categorias as CT ON CT.idcategoria = PR.idcategoria WHERE activo = 1 AND PR.idcategoria = 1 LIMIT  5 ");
        $sql->execute();

        $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        return $resultado;
    }
}
