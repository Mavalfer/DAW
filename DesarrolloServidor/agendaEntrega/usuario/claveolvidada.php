<?php
require'../classes/AutoLoad.php';
$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario !== null) {
    header('Location: ../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
        <h2>Recuperar clave</h2>
        <form method="post" action="dorecordar.php">
            <input type="email" name="correo" placeholder="Tu correo" required>
            <input type="submit" value="Enviar"/>
        </form>
    </body>
</html>