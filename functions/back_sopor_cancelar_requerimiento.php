<?php
require_once "../functions/helpers.php";

if(isset($_POST["codigo"])){
    $codigo = $_POST["codigo"];
    cancelar_requerimiento($codigo);
}else{
    echo "Error con el post";
}

