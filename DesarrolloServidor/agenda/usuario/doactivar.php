<?php
require '../classes/AutoLoad.php';

$db = new DataBase();
$gestor = new ManageUsuario($db);

$id = Request::read('id');
$mail = Request::read('data');

$user = $gestor->get($id);

if ($user !== null) {
    if ($user->getCorreo() === $mail) {
        $user->setVerificado(1);
        $gestor->edit($user);
        header('Location: ../index.php?ver=true');
    } else {
        header('Location: https://www.google.es/');
    }
} else {
    header('Location: https://www.google.es/');
}

$db->closeConnection();