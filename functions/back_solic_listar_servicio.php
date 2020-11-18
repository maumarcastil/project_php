<?php
require_once "../functions/helpers.php";
if(isset($_POST["id"])){
    $id = $_POST["id"];
    obener_servicios_categoria($id);
}else{
    $id = 0;
    obener_servicios_categoria($id);
}
