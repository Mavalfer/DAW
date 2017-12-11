<?php
require '../classes/AutoLoad.php';
require '../classes/vendor/autoload.php';
date_default_timezone_set('Europe/Madrid');
use \Firebase\JWT\JWT;
$clave = 'wasdwasd';
$dato = Request::read('dato');
$nuevaPass = Request::read('nuevapass');
$decoded = JWT::decode($dato, $clave, array('HS256'));


try{
    $decoded = JWT::decode($dato, $clave, array('HS256'));
} catch (Exception $e) {
    header('Location: ../index.php');
    exit;
}

$db = new DataBase();
$manager = new ManageUsuario($db);


$usuarioDB = $manager->get($decoded->id);
$claveEnriptada = Util::encriptar($nuevaPass);
$usuarioDB->setClave($claveEnriptada);
$res = $manager->edit($usuarioDB);
if ($res > 0) {
    header ('Location: ../index.php?opt=passcambiada');
} else {
   header ('Location: ../index.php?opt=error');
}

$db->closeConnection();