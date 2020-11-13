<?php

require "../db/Conexion.php";
global $con;


if (!empty($_POST)) {

    $categoria = isset($_POST['select_categoria']) ? $_POST["select_categoria"] : false;
    $servicio = isset($_POST['txt_servicio']) ? $_POST["txt_servicio"] : false;

    if ($categoria && $servicio) {

        $query = "INSERT INTO `tipo_servicio` (`servicio`, `categorias_idcategorias`, `active`) VALUES ('$servicio', '$categoria', '1');";

        mysqli_query($con, $query);
        mysqli_close($con);
        echo 'El servicio se creo exitoxamente!!';
        //header("location: ");
    } else {
        echo ("Algunos de los valores no son correctos");
    }
} else {
    echo ("Problemas en el POST");
}
