<?php
require_once "../functions/helpers.php";
$lista = obtener_requerimientos_solicitante();
echo json_encode($lista);
