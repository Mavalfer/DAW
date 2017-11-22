<?php
require '../classes/AutoLoad.php';
require '../classes/vendor/autoload.php';
date_default_timezone_set('Europe/Madrid');
use \Firebase\JWT\JWT;
$clave = 'mipalabrasecreta';
$dato = Request::read('dato');
$decoded = JWT::decode($dato, $clave, array('HS256'));

try{
    $decoded = JWT::decode($dato, $clave, array('HS256'));
} catch (Exception $e) {
    header('Location: ../index.php');
    exit;
}


echo Util::varDump($decoded);

