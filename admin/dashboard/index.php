<?php

include_once "includes/headersdas.php";

if($_SESSION['id_rol'] == 1 || $_SESSION['id_rol'] == 2) {


$nombreuser = $_SESSION['usuarios'];



$enlace = mysqli_connect("localhost", "root", "Andres7821", "empresa");

if (!$enlace) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$usuarios = mysqli_query($enlace, "SELECT * FROM usuarios");
$totalU = mysqli_num_rows($usuarios);

$productos = mysqli_query($enlace, "SELECT * FROM productos");
$totalP = mysqli_num_rows($productos);


?>


            <section class="py-2">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray">Panel de Administración</h1>
                </div>
                <h2 class="h3 mb-0 text-gray">Bienvenido(a) <?php echo $nombreuser; ?></h2>
                <div class="row">
                    <a class="col-xl-3 col-md-6 mb-4" href="../usuarios.php">
                        <div class="card border-left-primary shadow h-100 py-2 bg-warning">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Usuarios</div>
                                        <div class="h5 mb-0 font-weight-bold text-white"><?php echo $totalU; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>

                    <a class="col-xl-3 col-md-6 mb-4" style="text-decoration: none;" href="../productos.php">
                        <div class="card border-left-primary shadow h-100 py-2 bg-dark">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-white text-uppercase mb-1">Productos</div>
                                        <div class="h5 mb-0 font-weight-bold text-white"><?php echo $totalP; ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#content-wrapper").toggleClass("toggled");
    });
</script>


            <!-- Footer -->
            <?php include_once "includes/footerdas.php"; ?>

            <?php mysqli_close($enlace); ?>

            <script>
                function CargarContenido(pagina_php,contenedor){
                $("#" + contenedor).load(pagina_php);
                }
            </script>
<?php
      } else {
        error_reporting(0);
        echo "<br>";
        echo "<a href='../../views/'>Volver al inicio</a>";
        session_destroy();
      }
?>