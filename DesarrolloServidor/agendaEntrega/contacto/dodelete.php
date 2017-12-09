<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$idContacto = Request::read('idcontacto');

$db = new DataBase();
$gestorContacto = new ManageContacto($db);
$gestorTelefono = new ManageTelefono($db);

$contactoDB = $gestorContacto->get($idContacto);

if ($usuario->getId() === $contactoDB->getIdUsuario()) {
    $telBorrados = $gestorTelefono->removeFromContacto($contactoDB->getId());
    $contBorrado = $gestorContacto->remove($contactoDB->getId()); 
    header('Location: ../views/viewContactos.php?opt=borrarcontacto&telborrados=' . $telBorrados . '&contborrado=' . $contBorrado);
} else {
    header('Location: http://9hive.com/wp-content/uploads/2017/02/Offensively-Cute-Greeting-Cards-57db9683a3cc7__605.jpg');
}

$db->closeConnection();