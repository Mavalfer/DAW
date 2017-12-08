<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();

if($usuario === null) {
    header('Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ');
    exit;
}

$nuevoMail = Request::read('mail');
$nuevaPass = Request::read('pass');
$tuPass = Request::read('tupass');
$repitePass = Request::read('repitepass');
$opt = Request::read('opt');

if ($opt === 'mail' && Filter::isEmail($nuevoMail)) {
    $db = new DataBase();
    $manager = new ManageUsuario($db);
    $usuarioDB = $manager->get($usuario->getId());
    if ($usuarioDB !== null) {
        $usuarioDB->setCorreo($nuevoMail);
        $usuarioDB->setVerificado(0);
        $res = $manager->edit($usuarioDB);
        if ($res > 0) {
            $enlaceActivacion = '<a href="https://daw-mavalfer.c9users.io/DesarrolloServidor/agendaEntrega/usuario/doactivar.php?id=' . $usuarioDB->getId() . '&data=' . sha1($usuarioDB->getCorreo()) . '"></a>';
            $resultado2 = Util::enviarCorreo ('mvalfer92@gmail.com', 'AppAgenda', $enlaceActivacion);
            header('Location: dologout.php?opt=reactivar&r=' . $res);
        }
    }
} else if ($opt !== 'pass'){
    header('Location: ../views/viewEditUsuario.php?opt=nomail');
}

if ($opt === 'pass' && $nuevaPass !== null && $nuevaPass !== "" && $nuevaPass === $repitePass && $tuPass !== null && $tuPass !== "") {
    $db = new DataBase();
    $manager = new ManageUsuario($db);
    $usuarioDB = $manager->get($usuario->getId());
    $r = Util::verificarClave($tuPass, $usuarioDB->getClave());
    if ($r) {
        $claveEnriptada = Util::encriptar($nuevaPass);
        $usuarioDB->setClave($claveEnriptada);
        $res = $manager->edit($usuarioDB);
        if ($res > 0) {
            header('Location: dologout.php?opt=repass&r=' . $res);
        }
    } else {
        header('Location: ../views/viewEditUsuario.php?opt=nopass2');
    }
} else {
    header('Location: ../views/viewEditUsuario.php?opt=nopass');
}

$db->closeConnection();