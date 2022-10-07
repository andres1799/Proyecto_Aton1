<?php
require("modulos/header.php");

require("models/conexion.php");

$db1 = new Database1();
$con = $db1->conectar();




$sql = $con->prepare("SELECT PR.idproducto, PR.nombre, PR.descripcion, PR.precio, PR.idcategoria, PR.imagen, CT.categoria FROM productos as PR INNER JOIN categorias as CT ON CT.idcategoria = PR.idcategoria WHERE activo = 1 AND PR.idcategoria = 1 LIMIT  5 ");
$sql->execute();
$resultado = $sql->fetchAll(PDO::FETCH_ASSOC);




//session_destroy();

//print_r($_SESSION);

?>

<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link active" href="#">Portatil</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Marcas
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Rango de precios
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <form action="">
                <label for="" class="text-center">Precio Minimo</label>
                <input type="number" class="ml-1">
                <label for="" class="text-center">Precio Maximo</label>
                <input type="number" class="ml-1">
            </form>
        </div>
    </li>
</ul>



<div class="row mt-3 p-5">
    <?php foreach ($resultado as $row) { ?>
        <div class="col-md-3">
            <main class="grid">
                <article>
                    <?php
                    $id = $row['idproducto'];
                    $dir = "../assets/img/" .$row['categoria']. "/" .$id;
                    /*if(!is_dir($dir)){
                        mkdir($dir);
                    } */
                    $imagen = "../assets/img/" .$row['categoria']."/".$row['idproducto']."/".$row['imagen'];
                    if (!file_exists($imagen)) {
                        $imagen = "../assets/img/no-photo.jpg";
                    }
        
                    ?>

                    <img src="<?php echo $imagen; ?>" width="50" alt="" class="img-thumbnail">
                    <div class="card-body">
                        <h3><?php echo $row['nombre']; ?></h3>
                        <p class="card-text"><?php echo number_format($row['precio'], 2, '.', ','); ?></p>
                        <p class="card-text"><?php echo $row['descripcion']; ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="detalle.php?idproducto=<?php echo $row['idproducto']; ?>&token=<?php echo hash_hmac('sha1', $row['idproducto'], KEY_TOKEN); ?>" class="btn btn-warning">Detalles</a>
                            </div>
                            <button class="btn btn-outline-success" type="button" onclick="addProducto(<?php echo $row['idproducto']; ?>, '<?php echo hash_hmac('sha1', $row['idproducto'], KEY_TOKEN); ?>')">Agregar al carrito</button>
                        </div>
                    </div>
                </article>
            </main>
            <br>
        </div>
    <?php } ?>
</div>

<br>
<br>


<script>
    function addProducto(id, token) {
        let url = 'clases/carrito.php'
        let formdata = new FormData()
        formdata.append('idproducto', id)
        formdata.append('token', token)

        fetch(url, {
                method: 'POST',
                body: formdata,
                mode: 'cors'
            }).then(response => response.json())
            .then(data => {
                if (data.ok) {
                    let elemento = document.getElementById("num_cart")
                    elemento.innerHTML = data.numero
                }
            })
    }
</script>

<?php
include_once 'modulos/footer.php';
?>