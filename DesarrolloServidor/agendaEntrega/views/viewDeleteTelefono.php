<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$idTelefono = Request::read('idtelefono');
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
    <h1>¿Estas seguro?</h1>
    <a href="viewContactos.php">No</a>
    <a href="../telefono/dodelete.php?idtelefono=<?php echo $idTelefono; ?>">Si</a>
</body>
</html>