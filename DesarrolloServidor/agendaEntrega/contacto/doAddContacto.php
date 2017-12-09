<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$nuevoContacto = Request::read('contacto');

$db = new DataBase();

$gestor = new ManageContacto($db);

$contactoDB = $gestor->getFromNombreAndUsuario($nuevoContacto, $usuario->getId());

if ($contactoDB === null) {
    $nuevoContactoDB = new Contacto();
    $nuevoContactoDB->setIdUsuario($usuario->getId());
    $nuevoContactoDB->setNombre($nuevoContacto);
    if ($gestor->addConUsuario($nuevoContactoDB) > 0) {
        header ('Location: ../views/viewAddContacto.php?opt=bien');
    } else {
        header ('Location: ../views/viewAddContacto.php?opt=error');
    }
} else {
    header ('Location: ../views/viewAddContacto.php?opt=existe');
}


$db->closeConnection();