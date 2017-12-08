<?php
require'../classes/AutoLoad.php';
$usuario = new Usuario();
$usuario->read();
if (Filter::isEmail($usuario->getCorreo()) && $usuario->getClave() != "") {
    $sesion = new Session('agenda');
    $db = new DataBase();
    $manager = new ManageUsuario($db);
    $usuarioBD = $manager->getFromCorreo($usuario->getCorreo());
    if($usuarioBD === null) {
        $sesion->logout();
        $r = -1;
    } else {
        $r = Util::verificarClave($usuario->getClave(), $usuarioBD->getClave());
        
        if($r) {
            $sesion->login($usuarioBD);
            $r = 1;
        } else {
            $sesion->logout();
            $r = 0;
        }
    }    
} else {
    $r = 0;
}
header('Location: ../index.php?op=login&r=' . $r);