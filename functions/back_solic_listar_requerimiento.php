<?php
require_once "../functions/helpers.php";
$lista = obtener_requerimientos();
echo json_encode($lista);
