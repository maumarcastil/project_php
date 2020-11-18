<?php

require_once "../functions/helpers.php";

global $con;


if (!empty($_POST)) {

    $descripcion = isset($_POST['txt_descripcion']) ? $_POST["txt_descripcion"] : false;
    $ubicacion = isset($_POST['txt_ubicacion']) ? $_POST["txt_ubicacion"] : false;
    $categoria = isset($_POST['select_categoria']) ? $_POST["select_categoria"] : false;
    $servicio = isset($_POST['select_servicio']) ? $_POST["select_servicio"] : false;

    if($descripcion && $ubicacion && $categoria && $servicio){
        crear_requerimiento($descripcion, $ubicacion,$categoria, $servicio);
    }else{
        echo("Algunos de los valores no son correctos");
    }
}else{
    echo("Problemas en el POST");
}