<?php
require'../classes/AutoLoad.php';
$sesion = new Session('sesion');
$user = $sesion->getUser();
if($user === null){
    header('Location: ../');
    exit();
}
$idContacto = Request::get('idcontacto');
$idTelefono = Request::get('idtelefono');

$db = new DataBase();
$gestorTelefono = new ManageTelefono($db);
if($idContacto !== null) {
    $gestorContacto = new ManageContacto($db);
    if($idTelefono === null){
        $r = $gestorContacto->remove($idContacto);
        header('Location: index.php?action=deleteContacto&r=' . $r);
    } else {
        $r = $gestorTelefono->remove($idTelefono);
        $r2 = $gestorContacto->remove($idContacto);
        header('Location: index.php?action=deleteTelefonoContacto&r=' . $r . '&r2=' . $r2);
    }
} else {
    $r = $gestorTelefono->remove($idTelefono);
    header('Location: index.php?action=deleteTelefono&r=' . $r);
}

$dataBase->closeConnection();