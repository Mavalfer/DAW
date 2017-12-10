<?php
require '../classes/AutoLoad.php';
require '../classes/vendor/autoload.php';
date_default_timezone_set('Europe/Madrid'); 
use \Firebase\JWT\JWT;
$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario !== null) { 
    header('Location: ../index.php');
    exit;
}
$correo = Request::read('correo');
if(Filter::isEmail($correo)) {
    $db = new DataBase();
    $manager = new ManageUsuario($db);
    $usuarioBD = $manager->getFromCorreo($correo);
    if($usuarioBD !== null) {
        
        $array = array(
            'correo' => $usuarioBD->getCorreo(),
            'id' => $usuarioBD->getId(),
            'fecha' => date('Y/d/m H:i:s')
        );
        
        $clave = 'wasdwasd';
        
        $jwt = JWT::encode($array, $clave);
        $enlace = 'https://daw-mavalfer.c9users.io/DesarrolloServidor/agendaEntrega/usuario/reestablecer.php?';
        $enlace .= 'dato=' . $jwt;
        //echo $enlace . '<br>';
        //Util::enviarCorreo ($usuarioBD->getCorreo(), 'AppAgenda', 'Mensaje con el enlace de recuperacion: ' . $enlace);
        if (Util::enviarCorreo ('mvalfer92@gmail.com', 'AppAgenda', 'Mensaje con el enlace de recuperacion: ' . $enlace)) {
            header('Location: ../index.php?opt=recup');
        }
    }
}
$db->closeConnection();
//header('Location: ../index.php');