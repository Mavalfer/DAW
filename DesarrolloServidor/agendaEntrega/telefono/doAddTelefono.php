<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$idContacto = Request::read('idcontacto');
$nuevoTelefono = Request::read('tlf');
$descTelefono = Request::read('desc');

$db = new DataBase();
$gestorContacto = new ManageContacto($db);
$gestorTelefono = new ManageTelefono($db);

$contactoDB = $gestorContacto->get($idContacto);

if ($usuario->getId() === $contactoDB->getIdUsuario() && $nuevoTelefono !== null) {
    $telefonoDB = new Telefono();
    $telefonoDB->setIdContacto($idContacto);
    $telefonoDB->setTelefono($nuevoTelefono);
    $telefonoDB->setDescripcion($descTelefono);
    if ($gestorTelefono->add($telefonoDB) > 0) {
        header('Location: ../views/viewEditContactos.php?opt=añadido&idcontacto=' . $idContacto . '&ncontacto=' . $contactoDB->getNombre());
    } else {
        header('Location: https://www.google.es/');
    }
    
} else {
    header('Location: http://9hive.com/wp-content/uploads/2017/02/Offensively-Cute-Greeting-Cards-57db9683a3cc7__605.jpg');
}

$db->closeConnection();