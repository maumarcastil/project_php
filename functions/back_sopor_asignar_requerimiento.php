<?php
require_once "../functions/helpers.php";

if(isset($_POST["codigo"])){
    $codigo = $_POST["codigo"];
    asignar_requerimiento($codigo);
}else{
    echo "Error con el post";
}
