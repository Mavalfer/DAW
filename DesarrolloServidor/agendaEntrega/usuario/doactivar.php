<?php
require '../classes/AutoLoad.php';

$db = new DataBase();
$gestor = new ManageUsuario($db);

$id = Request::read('id');
$mail = Request::read('data');

$user = $gestor->get($id);

if ($user !== null) {
    if (sha1($user->getCorreo()) === $mail) {
        $user->setVerificado(1);
        $test = $gestor->edit($user);
        
        echo Util::varDump($user);
        echo $test;
        
        header('Location: ../index.php?opt=activar&r=' . $test);
    } else {
        header('Location: https://www.google.es/');
    }
} else {
    header('Location: https://www.google.es/');
}

$db->closeConnection();