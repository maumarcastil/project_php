<?php
require_once "../functions/helpers.php";

if(isset($_POST["id"])){
    $id = $_POST["id"];
    borrar_categoria($id);
}else{
    echo "Error con el post";
}

