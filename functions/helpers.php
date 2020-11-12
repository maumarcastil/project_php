<?php
session_start();

function isset_session_user()
{
    if (isset($_SESSION["user"])) {
        echo("La sesion SI existe");
        $tipo = $_SESSION["user"]["tipo"];
        switch ($tipo) {
            case "administrador":
                header("location: view_admin.php");
                //echo("<br>Redirect view_admin");
                break;
            case "tecnico":
                echo("<br>Redirect view_admin");
                break;
            case "solicitante":
                echo("<br>Redirect view_solicitante");
                break;
            default:
                echo("<br>no se tomo una opciones correctas");
                return die();
        }
    }
}

function redirect_unset_session(){
    if (!isset($_SESSION["user"])) {
        header("location: index.php");
    }

}
