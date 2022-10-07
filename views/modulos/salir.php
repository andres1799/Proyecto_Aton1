<?php
//Codigo simple para destruir la sesion, este se usa para el cierre de sesion de usuario
session_start();
session_destroy();

header('location: ../');
?>