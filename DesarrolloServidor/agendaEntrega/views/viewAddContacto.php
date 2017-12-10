<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
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
    <h1>Nuevo contacto</h1>
    <form action="../contacto/doAddContacto.php" method="POST">
        <input type="text" name="contacto" placeholder="Nombre de tu contacto"/>
        <input type="submit" value="Enviar"/>
    </form>
    <br>
    <a href="viewContactos.php">Volver</a>
    <span>
        <?php
            if ($opt === 'existe') {
                echo '<h1>El contacto ya existe</h1>';
            }
            
            if ($opt === 'bien') {
                echo '<h1>Contacto agregado</h1>';
            }
            
            if ($opt === 'error') {
                echo '<h1>Nope</h1>';
            }
        ?>
    </span>
</body>
</html>