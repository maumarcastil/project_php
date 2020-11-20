<?php
require_once "../functions/helpers.php";
$lista = obtener_requerimientos_soporte();
//var_dump($lista);
echo json_encode($lista);
