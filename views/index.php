<?php

require("modulos/header.php");

?>

<body>

    <div class="d-flex" id="content-wrapper">

        <script>
            function CargarContenido(pagina_php,contenedor){
            $("#" + contenedor).load(pagina_php);
        }

        </script>

        <?php require("modulos/sidebar.php"); ?>

        <?php require("modulos/navbar.php"); ?>


        <div id="contenedor">
            <?php require("verIndex.php"); ?>
        </div>

        <?php
        include_once 'modulos/footer.php';
        ?>

        
</body>

</html>