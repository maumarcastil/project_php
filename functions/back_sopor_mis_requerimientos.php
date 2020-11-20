<?php
require_once "../functions/helpers.php";
$lista = soporte_mis_requerimientos();
//var_dump($lista);
echo json_encode($lista);
