<?php

require("modulos/header.php");

require("models/conexion.php");

$enlace = mysqli_connect("localhost", "id19606414_root123123", "q9]R=*N9UA1ff\(m", "id19606414_empresa2123");

$user = $_SESSION['usuarios'];

$sql = "SELECT id, usuarios, clave, Nombre, Apellido, Direccion, Celular, Correo  FROM usuarios WHERE usuarios = '$user'";

$resultado = mysqli_query($enlace, $sql);
if ($resultado) {
    while ($row = $resultado->fetch_array()) {
        $id = $row['id'];
        $usuario = $row['usuarios'];
        $nombre = $row['Nombre'];
        $clave = $row['clave'];
        $Apellido = $row['Apellido'];
        $Direccion = $row['Direccion'];
        $celular = $row['Celular'];
        $Correo = $row['Correo'];
    }
}
?>

<body>



    <div class="d-flex" id="content-wrapper">

        <script>
            function CargarContenido(pagina_php, contenedor) {
                $("#" + contenedor).load(pagina_php);
            }
        </script>

        <?php require("modulos/sidebar.php"); ?>

        <?php require("modulos/navbar.php"); ?>
        <div class="card shadow col-xs-12 col-sm-6 col-md-6 p-4">
            <div class="mb-4 d-flex justify-content-start align-items-center">
                <h4> <i class="bi bi-chat-left-quote text-center"></i> &nbsp; Perfil</h4>
            </div>
            <div class="">
                <form id="contacto">
                    <div class="mb-4">
                        <label for="id"><i class="bi bi-envelope-fill"></i> Documento</label>
                        <input type="id" class="form-control" name="id" placeholder="" value="<?php echo $id; ?>" disabled>
                        <div class="correo text-danger"></div>
                    </div>
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre</label>
                            <input type="text" class="form-control" name="nombre" placeholder="" value="<?php echo $nombre; ?>" disabled>
                            <div class="nombre text-danger "></div>
                        </div>
                        <div>
                            <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Apellido</label>
                            <input type="text" class="form-control" name="apellido" placeholder="" value="<?php echo $Apellido; ?>" disabled>
                            <div class="apellido text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="correo"><i class="bi bi-envelope-fill"></i> Correo</label>
                        <input type="email" class="form-control" name="correo" placeholder="ej: gpmcheco@mail.com" value="<?php echo $Correo; ?>" disabled>
                        <div class="correo text-danger"></div>
                    </div>
                    <div class="mb-4 d-flex justify-content-between">
                        <div>
                            <label for="usuario"> <i class="bi bi-person-fill"></i> Usuario</label>
                            <input type="text" class="form-control" name="usuario" placeholder="" value="<?php echo $usuario ?>" disabled>
                            <div class="nombre text-danger "></div>
                        </div>
                        <div>
                            <label for="contraseña"> <i class="bi bi-person-bounding-box"></i> Contraseña</label>
                            <input type="text" class="form-control" name="contrasena" placeholder="" value="<?php echo $clave; ?>" disabled>
                            <div class="apellido text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="direccion"><i class="bi bi-envelope-fill"></i> Direccion</label>
                        <input type="text" class="form-control" name="direccion" placeholder="" value="<?php echo $Direccion; ?>" disabled>
                        <div class="correo text-danger"></div>
                    </div>
                    <div class="mb-4">
                        <label for="Celular"><i class="bi bi-envelope-fill"></i> Celular</label>
                        <input type="text" class="form-control" name="celular" placeholder="" value="<?php echo $celular; ?>" disabled>
                        <div class="correo text-danger"></div>
                    </div>

                    <td><button type="button" data-target="#editarPerfilModal" data-toggle="modal" class="btn btn-warning editbtn">Editar</button></td>

                    <!-- Modal -->
                    <div class="modal fade" id="editarPerfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="editarPerfil.php" method="POST">
                                        <div class="mb-4">
                                            <label for="id"><i class="bi bi-envelope-fill"></i> Documento</label>
                                            <input type="id" class="form-control" name="id" id="id" placeholder="" value="<?php echo $id; ?>">
                                            <div class="correo text-danger"></div>
                                        </div>
                                        <div class="mb-4 d-flex justify-content-between">
                                            <div>
                                                <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre</label>
                                                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="<?php echo $nombre; ?>">
                                                <div class="nombre text-danger "></div>
                                            </div>
                                            <div>
                                                <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Apellido</label>
                                                <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" value="<?php echo $Apellido; ?>">
                                                <div class="apellido text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="correo"><i class="bi bi-envelope-fill"></i> Correo</label>
                                            <input type="email" class="form-control" name="correo" id="correo" placeholder="ej: gpmcheco@mail.com" value="<?php echo $Correo; ?>">
                                            <div class="correo text-danger"></div>
                                        </div>
                                        <div class="mb-4 d-flex justify-content-between">
                                            <div>
                                                <label for="usuario"> <i class="bi bi-person-fill"></i> Usuario</label>
                                                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="" value="<?php echo $usuario ?>">
                                                <div class="nombre text-danger "></div>
                                            </div>
                                            <div>
                                                <label for="contraseña"> <i class="bi bi-person-bounding-box"></i> Contraseña</label>
                                                <input type="text" class="form-control" name="contrasena" id="contraseña" placeholder="" value="<?php echo $clave; ?>">
                                                <div class="apellido text-danger"></div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="direccion"><i class="bi bi-envelope-fill"></i> Direccion</label>
                                            <input type="text" class="form-control" name="direccion" id="direccion" placeholder="" value="<?php echo $Direccion; ?>">
                                            <div class="correo text-danger"></div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="Celular"><i class="bi bi-envelope-fill"></i> Celular</label>
                                            <input type="text" class="form-control" name="celular" id="celular" placeholder="" value="<?php echo $celular; ?>">
                                            <div class="correo text-danger"></div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-danger">Guardar Cambios</button>
                                        </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>
        <?php
        include_once 'modulos/footer.php';
        ?>

</body>