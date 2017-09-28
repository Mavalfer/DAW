<?php
    //importar la clase request
    require 'Request.php'; //si no lo encuentra va a dar error

    $nombre = Request::read('nombre');
    $apellidos = Request::read('apellidos');
    $fecha = Request::read('fecha');
    $tlf = Request::read('tlf');
    $mail = Request::read('mail');
    /*
    if (isset ($_GET['nombre'])) {
        $nombre = $_GET['nombre'];
    } else if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
    }
    
    if (isset ($_GET['apellido'])){
        $apellido = $_GET['apellido'];
    } else if (isset($_POST['apellido'])) {
        &apellido = $_POST['apellido'];
    }

    if (isset ($_GET['fecha'])) {
        $fecha = $_GET['fecha'];
    } else if (isset ($_POST['fecha'])) {
        $fecha = $_POST['fecha'];
    }

    if (isset ($_GET['tlf'])) {
        $tlf = $_GET['tlf'];
    } else if (isset ($_POST['tlf'])) {
        $tlf = $_POST['tlf'];
    }

    if (isset ($_GET['mail'])) {
        $mail = $_GET['mail'];
    } else if (isset ($_POST['mail'])) {
        $mail = $_POST['mail'];
    }
    */
    //Ahora inventarse algo para evitar este tedio de isset y asignar valor
    //vamos a construir una clase 'Request'
    // con los metodos get, post, y read
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>...</title>
    </head>
    <body>
        <div>
            <?php 
                echo "asdasd" . $nombre . "asdasd";
            ?>
        </div>
    </body>
</html>