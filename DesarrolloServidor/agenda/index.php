<?php
require'./classes/AutoLoad.php';
$op = Request::read('op');
$r = Request::read('r');
$ver = Request::read('ver');
$mensaje = '';
if($op !== null) {
    $mensaje = '<h1>Operación: ' .$op . ' ' . $r . '</h1>';
}

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
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
        <?php
        echo $mensaje;
        ?>
        <h1>agenda</h1>
        <hr>
        <?php
        if($usuario === null) {
        ?>
        <h2>date de alta</h2>
        <form method="post" action="usuario/doalta.php">
            <input type="email" name="correo" placeholder="correo" required>
            <input type="password" name="clave" placeholder="clave" required>
            <input type="password" name="claveRepetida" placeholder="repite clave" required>
            <input type="submit" value="Submit"/>
        </form>
        <hr>
        <h2>loguéate</h2>
        <form method="post" action="usuario/dologin.php">
            <input type="email" name="correo" placeholder="correo" required>
            <input type="password" name="clave" placeholder="clave" required>
            <input type="submit" value="Submit"/>
        </form>
        <hr>
        <h3><a href="usuario/claveolvidada.php">He olvidado mi contraseña</a></h3>
        <?php
        } else {
            echo '<h1>Hola ' . $usuario->getCorreo() . '</h1>';
            echo '<h1><a href="usuario/dologout.php">cerrar sesion</a></h1>';
            
        }
        ?>
        <hr>
    </body>
</html>