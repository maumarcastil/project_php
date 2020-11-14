<?php

require "../db/Conexion.php";

global $con;


/////////////////  HTML  //////////////////////////

//REDIRIGE LAS PAGINAS
function isset_session_user()
{
    if (isset($_SESSION["user"])) {
        echo("La sesion SI existe");
        $tipo = $_SESSION["user"]["tipo"];
        switch ($tipo) {
            case "administrador":
                header("location: view_admin.php");
                break;
            case "tecnico":
                echo("<br>Redirect view_admin");
                break;
            case "solicitante":
                header("location: view_solicitante.php");
                break;
            default:
                echo("<br>no se tomo una opciones correctas");
                return die();
        }
    }
}
//REDIRIGE LAS PAGINAS
function redirect_unset_session(){
    if (!isset($_SESSION["user"])) {
        header("location: index.php");
    }

}


function existen_requerimientos(){
    $res = obtener_requerimientos();
    if(empty($res)){

        $html = '<div class="card">
                    <div class="card-header bg-ligth">
                        Sin requerimientos!
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>Crea un nuevo requirimiento <a data-toggle="modal" data-target="#modal_crear_requerimiento" href="">aqui</a>.</p>
                        </blockquote>
                    </div>
                </div>';


        echo $html;
    }else{
        echo "Hay requerimientos!";
    }

}










/////////// TIPO USUARIO////////////////////////

//retorna los tipo usuario
function obtener_tipo(){
    global $con;
    $query = "select * from tipo_usuario;";
    $sql = mysqli_query($con, $query);
    $response = mysqli_fetch_all($sql); 
    return $response;
}



/////////////// USUARIOS ///////////////


//obtener todos usuarios
function obtener_usuarios(){
    global $con;
    $query = "select * from usuarios where active = 1;";
    $sql = mysqli_query($con, $query);
    mysqli_close($con);
    $response = mysqli_fetch_all($sql);
    echo json_encode($response);
}

//borrar usuario
function borrar_usuario($id){
    global $con;
    $query = "UPDATE `usuarios` SET `active` = '0' WHERE (`idusuarios` = $id);";
    $sql = mysqli_query($con, $query);
    mysqli_close($con);
    echo "Borardo exitoso";
}


/////////////// CATEGORIAS  ////////////////

//retorna las categorias
function obtener_categorias(){
    global $con;
    $query = "select * from categorias where active = 1;";
    $sql = mysqli_query($con, $query);
    $response = mysqli_fetch_all($sql); 
    echo json_encode($response);
}

function obtener_categorias_select(){
    global $con;
    $query = "select * from categorias where active = 1;";
    $sql = mysqli_query($con, $query);
    $response = mysqli_fetch_all($sql); 
    return $response;
}

//borrar usuario
function borrar_categoria($id){
    global $con;
    $query = "UPDATE `categorias` SET `active` = '0' WHERE (`idcategorias` = $id);";
    $sql = mysqli_query($con, $query);
    mysqli_close($con);
    echo "Borardo exitoso";
}


/////////////// SERVICIOS  ////////////////

//retorna las categorias
function obtener_servicios(){
    global $con;
    $query = "SELECT t.idtipo_servicio, c.categoria, t.servicio, t.active FROM tipo_servicio t
    inner join categorias c on t.categorias_idcategorias = c.idcategorias where t.active = 1;";
    $sql = mysqli_query($con, $query);
    mysqli_close($con);
    $response = mysqli_fetch_all($sql); 
    echo json_encode($response);
}

//borrar usuario
function borrar_servicio($id){
    global $con;
    $query = "UPDATE `tipo_servicio` SET `active` = '0' WHERE (`idtipo_servicio` = $id);";
    $sql = mysqli_query($con, $query);
    mysqli_close($con);
    echo "Borardo exitoso";
}


//////////////////  REQUERIMIENTOS  ///////////////

function obtener_requerimientos(){
    global $con;
    $query = "select * from requerimientos where solicitante_idusuarios = ".$_SESSION["user"]["idusuarios"].";";
    $sql = mysqli_query($con, $query);
    mysqli_close($con);
    $response = mysqli_fetch_all($sql);
    return  $response;
}