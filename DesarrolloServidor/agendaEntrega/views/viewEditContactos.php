<?php
require'./classes/AutoLoad.php';
$op = Request::read('op');
$r = Request::read('r');
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
    
</body>
</html>