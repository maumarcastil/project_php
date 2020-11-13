<?php

require "../db/Conexion.php";

global $con;

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


//retorna las categorias
function obtener_tipo(){
    global $con;
    $query = "select * from tipo_usuario;";
    $sql = mysqli_query($con, $query);
    $response = mysqli_fetch_all($sql); 
    return $response;
}

//retorna las categorias
function obtener_categorias(){
    global $con;
    $query = "select * from categorias;";
    $sql = mysqli_query($con, $query);
    $response = mysqli_fetch_all($sql); 
    return($response);
}

//retorna los servicios
function obtener_servicios(){
    
    
}


//obtener todos usuarios
function obtener_usuarios(){
    global $con;
    $query = "select * from usuarios;";
    $sql = mysqli_query($con, $query);
    mysqli_close($con);
    $response = mysqli_fetch_all($sql);
    echo json_encode($response);



    /* $html = '<div class="card-footer">

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Dirreccion</th>
                <th scope="col">Numero</th>
                <th scope="col">Email</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($response as $x) {
        $html = $html. '
        <tr>
        <td>'.$x[1].'</td>
        <td>'.$x[2].'</td>
        <td>'.$x[3].'</td>
        <td>'.$x[4].'</td>
        <td><i class="fas fa-edit p-1 text-primary"></i><i class="fas fa-minus-circle p-1 text-danger"></i></td>
        </tr>';
    }

    $html = $html. '</tbody></table></div>'; */
   //echo ($html);
    //var_dump($response);
}
