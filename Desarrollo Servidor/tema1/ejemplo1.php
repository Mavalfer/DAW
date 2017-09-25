<?php
    if (isset ($_POST['nombre'])) { //isset comprueba si ha llegado un parametro con ese nombre, antes de recibir el post y el get hay que hacer esa comprobacion para quitar el notice que sale como error
        $nombreP = $_POST['nombre'];
    }
    
   // $nombreG = $_GET['nombre']; nunca leer el parametro asi, ni con get ni post ni request, siempre hacer la comprobacion isset

    if (isset ($_GET['nombre'])) {
        $nombreG = $_GET['nombre'];
    }

    if ($nombreP == null) {
        $mensaje = $nombreG;
    } else {
        $mensaje = $nombreP;
    }

    //$apellidos = $_POST['apellidos'];
    //$mensaje = "Hola $nombre $apellidos.";
    //$_REQUEST dice que el no lo usa, prefiere que no lo usemos
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $mensaje; ?></title>
    </head>
    <body>
        <div>
            <?php
                echo "<h1>$mensaje.</h1>";
            ?>
        </div>
    </body>
</html>
<!-- primer ejemplo de php
paradigma de codigo llamado macarrónico-->