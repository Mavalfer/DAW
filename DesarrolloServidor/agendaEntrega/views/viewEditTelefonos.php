<?php
require'../classes/AutoLoad.php';

$idTelefono = Request::read('idtelefono');
$idContacto = Request::read('idcontacto');
$descTelefono = Request::read('dtelefono');
$nombreContacto = Request::read('ncontacto');

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
    <h1>Editando <?php echo $descTelefono; ?> de <?php echo $nombreContacto; ?></h1>
    <form action="../telefono/doedit.php" method="POST">
        <input type="hidden" name="idcontacto" value="<?php echo $idContacto; ?>"/>
        <input type="hidden" name="idtelefono" value="<?php echo $idTelefono; ?>"/>
        <input type="text" name="telnuevo" placeholder="Nuevo telefono"/>
        <input type="text" name="descnueva" placeholder="Nueva descripcion"/>
        <input type="submit" value="Enviar"/>
    </form>
    <br>
    <a href="viewContactos.php">Volver</a>
</body>
</html>