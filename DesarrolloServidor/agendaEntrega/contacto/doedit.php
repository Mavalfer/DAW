<?php
require'../classes/AutoLoad.php';

$idContacto = Request::read('idnombre');
$nombreContacto = Request::read('nombrenuevo');

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if ($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$db = new DataBase();
$gestorContacto = new ManageContacto($db);

$contactoDB = $gestorContacto->get($idContacto);

if ($usuario->getId() === $contactoDB->getIdUsuario()) {
    $contactoDB->setNombre($nombreContacto);
    $gestorContacto->edit($contactoDB);
    header('Location: ../views/viewContactos.php?opt=editado');
} else {
    header('Location: http://9hive.com/wp-content/uploads/2017/02/Offensively-Cute-Greeting-Cards-57db9683a3cc7__605.jpg');
}

$db->closeConnection();
