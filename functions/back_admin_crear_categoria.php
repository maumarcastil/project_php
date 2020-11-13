<?php

require "../db/Conexion.php";
global $con;


if (!empty($_POST)) {

    $categoria = isset($_POST['txt_categoria']) ? $_POST["txt_categoria"] : false;

    if($categoria){

        $query = "INSERT INTO `categorias` (`categoria`, `active`) VALUES ('$categoria', '1');";

        mysqli_query($con, $query);
        mysqli_close($con);
        echo 'La categoria se creo exitoxamente!!';
        //header("location: ");
    }else{
        echo("Algunos de los valores no son correctos");
    }
}else{
    echo("Problemas en el POST");
}