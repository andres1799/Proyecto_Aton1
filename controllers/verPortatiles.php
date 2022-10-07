<?php

require('models/getPortatiles.php');

$cons = new Consultas();

$portatiles = $cons->getPortatiles();

require('views/verPortatiles.php');

?>