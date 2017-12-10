<?php
require'../classes/AutoLoad.php';

$idContacto = Request::read('idcontacto');
$nombreContacto = Request::read('ncontacto');
$opt = Request::read('opt');

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
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
    <h1>Editando <?php echo $nombreContacto; ?></h1>
    <br>
    <h2>Cambiar nombre</h2>
    <br>
    <form action="../contacto/doedit.php" method="POST">
        <input type="hidden" name="idnombre" value="<?php echo $idContacto; ?>"/>
        <input type="text" name="nombrenuevo" placeholder="Nuevo nombre"/>
        <input type="submit" value="Enviar"/>
    </form>
    <br>
    <h2>Añadir un telefono</h2>
    <br>
    <form action="../telefono/doAddTelefono.php" method="POST">
        <input type="hidden" name="idcontacto" value="<?php echo $idContacto; ?>"/>
        <input type="text" name="tlf" placeholder="Telefono"/>
        <input type="text" name="desc" placeholder="Descripcion"/>
        <input type="submit" value="Enviar"/>
    </form>
    <br>
    <a href="viewContactos.php">Volver</a>
    <br>
    <span>
        <?php 
            if ($opt === 'añadido') {
                echo '<h1>Telefono añadido</h1>';
            }
        ?>
    </span>
</body>
</html>