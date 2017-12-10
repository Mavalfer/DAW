<?php
require'../classes/AutoLoad.php';

$idContacto = Request::read('idcontacto');
$idTelefono = Request::read('idtelefono');
$nuevoTelefono = Request::read('telnuevo');
$nuevaDesc = Request::read('descnueva');

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if ($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$db = new DataBase();
$gestorContacto = new ManageContacto($db);
$gestorTelefono = new ManageTelefono($db);

$telefonoDB = $gestorTelefono->get($idTelefono);
$contactoDB = $gestorContacto->get($idContacto);

if ($usuario->getId() === $contactoDB->getIdUsuario() && $contactoDB->getId() === $telefonoDB->getIdContacto() && $nuevoTelefono !== null) {
    $telefonoDB->setTelefono($nuevoTelefono);
    $telefonoDB->setDescripcion($nuevaDesc);
    $gestorTelefono->edit($telefonoDB);
    header('Location: ../views/viewContactos.php?opt=editadotel');
} else {
    header('Location: http://9hive.com/wp-content/uploads/2017/02/Offensively-Cute-Greeting-Cards-57db9683a3cc7__605.jpg');
}

$db->closeConnection();