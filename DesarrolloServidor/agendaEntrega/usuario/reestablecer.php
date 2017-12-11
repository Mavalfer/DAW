<?php
require '../classes/AutoLoad.php';
require '../classes/vendor/autoload.php';
date_default_timezone_set('Europe/Madrid');
use \Firebase\JWT\JWT;
$clave = 'wasdwasd';
$dato = Request::read('dato');
$decoded = JWT::decode($dato, $clave, array('HS256'));

try{
    $decoded = JWT::decode($dato, $clave, array('HS256'));
} catch (Exception $e) {
    header('Location: ../index.php');
    exit;
}
//echo Util::varDump($decoded);

//$fechaString = $decoded['fecha'];

//Cambiarlo en 2038

// $fecha = strtotime($decoded->fecha);
// $fechaActual = time();

// echo Util::varDump($fecha);
// echo Util::varDump($fechaActual);

// if ($fechaActual - $fecha < 30) {
//   // header ('Location: ../index.php?opt=passcambiada');
// } else {
//   //  header ('Location: ../index.php?opt=expirado');
// }



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
    <form action="doReestablecer.php">
        <input type="hidden" name="dato" value="<?php echo $dato ?>"/>
        <input type="text" name="nuevapass" placeholder="Nueva Contraseña"/>
        <input type="submit" value="Enviar"/>
    </form>
</body>
</html>
