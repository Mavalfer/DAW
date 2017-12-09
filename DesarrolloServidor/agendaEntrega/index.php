<?php
require'./classes/AutoLoad.php';
$opt = Request::read('opt');
$r = Request::read('r');
$mensaje = '';

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
        <span>
        <?php
            if ($opt === 'activar') {
                
                if ($r === '1') {
                    echo '<h1>Correo activado</h1>';
                }
                if ($r === '0') {
                    echo '<h1>El correo ya ha sido activado</h1>';
                }
            }

            if ($opt === 'reactivar') {
                    echo '<h1>Se ha enviado un enlace de activacion al nuevo correo</h1>';
            }

            if ($opt === 'repass') {
                echo '<h1>Puedes iniciar sesion con tu nueva contraseña</h1>';
            }
        ?>
        </span>
        <?php
        } else {
            header('Location: views/viewContactos.php');
        }
        ?>
        <hr>
    </body>
</html>