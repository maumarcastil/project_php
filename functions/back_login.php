<?php

require "../db/Conexion.php";


if (!empty($_POST)) {
    $email = !empty($_POST['txt_email']) ? $_POST['txt_email'] : false;
    $temp_pasword = !empty($_POST['txt_password']) ? $_POST['txt_password'] : false;

    if ($email != false && $temp_pasword != false) {

        echo ("Los datos son:<br>");
        echo($email . " - " . $temp_pasword);

        $query = "call login('$email', '$temp_pasword');";
        $sql = mysqli_query($con, $query);
        mysqli_close($con);
        // Si existe el correo
        if (mysqli_num_rows($sql) == 1) {
            $row = mysqli_fetch_assoc($sql);
            //Mostrar data
            var_dump($row);
            
            $tipo = $row["tipo"];  
            //si el tipo de usuario es x redirigir a
            switch ($tipo) {
                case "administrador":
                    $_SESSION["user"] = $row;
                    header("location: ../views/view_admin.php");
                    //echo("<br>Redirect view_admin");
                    break;
                case "tecnico":
                    $_SESSION["user"] = $row;
                    echo("<br>Redirect view_admin");
                    break;
                case "solicitante":
                    $_SESSION["user"] = $row;
                    echo("<br>Redirect view_solicitante");
                    break;
                default:
                    echo("<br>no se tomo una opciones correctas");
                    return die();
            }
        } else {
            $_SESSION["error"] = "El usuario no existe";
            echo("El usuario no existe");
            return die();
        }
        
        
    } else {
        $_SESSION["error"] = "Valores incorrectos";
        echo ("Valores incorrectos");
        return die();
    }
} else {
    $_SESSION["error"] = 'Error con el $POST';
    echo ('Error con el $POST');
    return die();
}
?>