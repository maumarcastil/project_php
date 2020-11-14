<?php
require_once "../functions/helpers.php";

if(isset($_POST["id"])){
    $id = $_POST["id"];
    borrar_servicio($id);
}else{
    echo "Error con el post";
}

