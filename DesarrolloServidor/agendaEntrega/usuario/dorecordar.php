<?php
require '../classes/AutoLoad.php';
require '../classes/vendor/autoload.php';
date_default_timezone_set('Europe/Madrid'); //hay que definir la zona horaria
//composer require firebase/php-jwt
use \Firebase\JWT\JWT;//paquete, en PHP se llaman namespace
$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario !== null) {   /*eso comprobarlo frecuentemente*/
    header('Location: ../index.php');
    exit;
}
$correo = Request::read('correo');
if(Filter::isEmail($correo)) {
    $db = new DataBase();
    $manager = new ManageUsuario($db);
    $usuarioBD = $manager->getFromCorreo($correo);
    if($usuarioBD !== null) {
        // $enlace = 'https://daw-mavalfer.c9users.io/DesarrolloServidor/agenda/usuario/reestablecer.php?';
        // $codificar = sha1($usuarioBD->getId() . 'al azar' . $usuarioBD->getCorreo());
        // $enlace .= 'dato=' . $codificar;
        // echo $enlace . '<br>';
        
        $array = array(
            'correo' => $usuarioBD->getCorreo(),
            'id' => $usuarioBD->getId(),
            'fecha' => date('Y/d/m H:i:s')//hay que especificar cómo quiero la fecha y hora
        );
        
        
        $clave = 'mipalabrasecreta';
        
        $jwt = JWT::encode($array, $clave);
        $enlace = 'https://daw-mavalfer.c9users.io/DesarrolloServidor/agenda/usuario/reestablecer.php?';
        $enlace .= 'dato=' . $jwt;
        echo $enlace . '<br>';
        //Util::enviarCorreo ($usuarioBD->getCorreo(), 'AppAgenda', 'Mensaje con el enlace de recuperacion: ' . $enlace);
        Util::enviarCorreo ('mvalfer92@gmail.com', 'AppAgenda', 'Mensaje con el enlace de recuperacion: ' . $enlace);
    }
}
$db->closeConnection();
//header('Location: ../index.php');