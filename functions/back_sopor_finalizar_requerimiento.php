<?php
require_once "../functions/helpers.php";


if (!empty($_POST)) {

    $codigo = isset($_POST['txt_codigo']) ? $_POST["txt_codigo"] : false;
    $detalle = isset($_POST['txt_detalle']) ? $_POST["txt_detalle"] : false;

    if ($codigo && $detalle) {

        finalizar_requerimiento($codigo, $detalle, "atendido");
    } else {
        echo ("Algunos de los valores no son correctos");
    }
} else {
    echo ("Problemas en el POST");
}
