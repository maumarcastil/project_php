<?php

require "../db/Conexion.php";

global $con;


if (!empty($_POST)) {

    $nombre_completo = isset($_POST['txt_nombre']) ? $_POST["txt_nombre"] : false;
    $dir = isset($_POST['txt_dir']) ? $_POST["txt_dir"] : false;
    $num = isset($_POST['txt_num']) ? $_POST["txt_num"] : false;
    $email = isset($_POST['txt_email']) ? $_POST["txt_email"] : false;
    $contra = isset($_POST['txt_password']) ? $_POST["txt_password"] : false;
    $tipo = isset($_POST['select_tipo']) ? $_POST["select_tipo"] : false;

    if($nombre_completo && $dir && $num && $email && $contra && $tipo){

        $query = "INSERT INTO `usuarios` (`nombre_completo`, `direccion`, `telefono`, `email`, `password`, `idtipo_usuario`) 
        VALUES ('$nombre_completo', '$dir', $num, '$email', '$contra', $tipo);";
        mysqli_query($con, $query);
        mysqli_close($con);
        echo 'El usuario se registro exitosamente!!';
    }else{
        echo("Algunos de los valores no son correctos");
    }
}else{
    echo("Problemas en el POST");
}