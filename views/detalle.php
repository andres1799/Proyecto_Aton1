<?php
require("modulos/header.php");

require("models/conexion.php");

$db1 = new Database1();
$con = $db1->conectar();

$id = isset($_GET['idproducto']) ? $_GET['idproducto'] : '';

$token = isset($_GET['token']) ? $_GET['token'] : '';

if ($id == '' || $token == '') {
    echo 'Error al procesar la peticion';
    exit;
} else {

    $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

    if ($token == $token_tmp) {
        $sql = $con->prepare("SELECT count(idproducto) FROM productos WHERE idproducto=? AND activo=1");
        $sql->execute([$id]);
        if ($sql->fetchColumn() > 0) {

            $sql = $con->prepare("SELECT PR.idproducto, PR.nombre, PR.descripcion, PR.descripcion_larga, PR.precio, PR.descuento, CT.categoria, PR.imagen FROM productos as PR INNER JOIN categorias as CT ON CT.idcategoria = PR.idcategoria WHERE PR.idproducto=? AND PR.activo=1 LIMIT 1");
            $sql->execute([$id]);
            $row = $sql->fetch(PDO::FETCH_ASSOC);
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $descripcion_larga = $row['descripcion_larga'];
            $precio = $row['precio'];
            $descuento = $row['descuento'];
            $categoria = $row['categoria'];
            $imagen = $row['imagen'];
            $precio_desc = $precio - (($precio * $descuento) / 100);
            $dir_images = '../assets/img/' . $categoria . '/' . $id . '/';

            $rutaImg = $dir_images . $imagen;

            if (!file_exists($rutaImg)) {
                $rutaImg = '../assets/img/no-photo.jpg';
            }
            $imagenes = array();
            if (file_exists($dir_images)) {
                $dir = dir($dir_images);

                while (($archivo = $dir->read()) != false) {
                    if ($archivo != $imagen && (strpos($archivo, 'jpg') || strpos($archivo, 'png'))) {
                        $imagenes[] = $dir_images . $archivo;
                    }
                }
                $dir->close();
            }
        }
    } else {
        echo 'Error al procesar la peticion';
        exit;
    }
}

?>


<body>

    <div class="d-flex" id="content-wrapper">

        <?php require("modulos/sidebar.php"); ?>

        <?php require("modulos/navbar.php"); ?>


        <div class="container-cag">
            <div class="row">
                <div class="col-md-6 order-md-1">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="<?php echo $rutaImg ?>" class="d-block w-100">
                            </div>

                            <?php foreach ($imagenes as $img) { ?>
                                <div class="carousel-item">
                                    <img src="<?php echo $img; ?>" class="d-block w-100">
                                </div>
                            <?php } ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </button>
                    </div>
                </div>

                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre; ?> </h2>
                    <?php if ($descuento > 0) { ?>
                        <p><del><?php echo MONEDA . number_format($precio, 2, '.', ','); ?></del></p>
                        <h2>
                            <?php echo MONEDA . number_format($precio_desc, 2, '.', ','); ?>
                            <small class="text-success"><?php echo $descuento; ?> % descuento</small>
                        </h2>
                    <?php } else { ?>

                        <h2><?php echo MONEDA . number_format($precio, 2, '.', ','); ?> </h2>
                    <?php } ?>

                    <p class="lead">
                        <?php echo $descripcion_larga; ?>
                    </p>
                    <div class="col-3 my-3">
                        Cantidad: <input class="form-control" id="cantidad" name="cantidad" type="number" min="1" max="10" value="1">
                    </div>
                    <div class="d-grid gap-3 col-10 mx-auto">
                        <a href="pago.php" class="btn btn-warning" id="btnAgregar" onclick="addProducto(<?php echo $id; ?>, cantidad.value, '<?php echo $token_tmp; ?>')" type="button">Comprar ahora</a>
                        <button class="btn btn-outline-primary" id="btnAgregar" onclick="addProducto(<?php echo $id; ?>, cantidad.value, '<?php echo $token_tmp; ?>')" type="button">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
        /*
            let btnAgregar = document.getElementById('btnAgregar')
            let inputCantidad = document.getElementById('cantidad').value
            btnAgregar.onclick = addProducto(<?php /* echo $id; ?>, inputCantidad, '<?php echo $token_tmp; */ ?>')
        */

            function addProducto(id, cantidad, token) {
                let url = 'clases/carrito.php'
                let formdata = new FormData()
                formdata.append('idproducto', id)
                formdata.append('cantidad', cantidad)
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