<?php
require'../classes/AutoLoad.php';

$idContacto = Request::read('idcontacto');
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
    <h1>Editando <?php echo $nombreContacto; ?></h1>
    <form action="../contacto/doedit.php" method="POST">
        <input type="hidden" name="idnombre" value="<?php echo $idContacto; ?>"/>
        <input type="text" name="nombrenuevo" placeholder="Nuevo nombre"/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>