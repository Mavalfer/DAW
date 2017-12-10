<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();

if($usuario === null) {
    header('Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ');
    exit;
}

$opt = Request::read('opt');
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
    <h1>Editar <?php echo $usuario->getCorreo(); ?></h1>
    <form action="../usuario/doedit.php?opt=mail" method="POST">
        <label for="mail">Nuevo correo</label>
        <input type="email" name="mail"/>
        <input type="submit" value="Actualizar correo"/>
    </form>
    <form action="../usuario/doedit.php?opt=pass" method="POST">
        <label for="tupass">Contraseña actual</label>
        <input type="password" name="tupass"/>
        <br>
        <label for="pass">Nueva contraseña</label>
        <input type="password" name="pass"/>
        <label for="repitepass">Repite contraseña</label>
        <input type="password" name="repitepass"/>
        <input type="submit" value="Actualizar contraseña"/>
    </form>
    <br>
    <a href="viewContactos.php">Volver</a>
    <span>
        <?php 
            if ($opt === 'nomail') {
                echo '<h1>Introduce un correo</h1>';
            }
            
            if ($opt === 'nopass') {
                echo '<h1>Introduce tu contraseña y dos contraseñas iguales</h1>';
            }
            
            if ($opt === 'nopass2') {
                echo '<h1>Tu contraseña no es correcta</h1>';
            }
        ?>
    </span>
</body>
</html>