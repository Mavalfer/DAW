<?php
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $mensaje = "Hola $nombre $apellidos."
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