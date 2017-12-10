<?php
require'../classes/AutoLoad.php';

$sesion = new Session('agenda');
$usuario = $sesion->getUser();
if($usuario === null) {
    header('Location: ../index.php');
    exit;
}

$idTelefono = Request::read('idtelefono');

$db = new DataBase();
$gestorContacto = new ManageContacto($db);
$gestorTelefono = new ManageTelefono($db);

$telefonoDB = $gestorTelefono->get($idTelefono);
if ($telefonoDB !== null){
    $contactoDB = $gestorContacto->get($telefonoDB->getIdContacto());
}

if ($telefonoDB !== null && $usuario->getId() === $contactoDB->getIdUsuario() && $contactoDB->getId() === $telefonoDB->getIdContacto()) {
    $telBorrado = $gestorTelefono->remove($telefonoDB->getId());
    header('Location: ../views/viewContactos.php?opt=borrartelefono&telborrados=' . $telBorrado);
} else {
    header('Location: http://9hive.com/wp-content/uploads/2017/02/Offensively-Cute-Greeting-Cards-57db9683a3cc7__605.jpg');
}

$db->closeConnection();