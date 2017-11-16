<?php
require'../classes/AutoLoad.php';
$usuario = new Usuario();
$usuario->read();
$claveRepetida = Request::read('claveRepetida');
$resultado = -1;
if(Filter::isEmail($usuario->getCorreo()) && $usuario->getClave() === $claveRepetida) {
    $claveEnriptada = Util::encriptar($usuario->getClave());
    $usuario->setClave($claveEnriptada);
    $db = new DataBase();
    $manager = new ManageUsuario($db);
    $resultado = $manager->addUsuario($usuario);
    //enviarCorreoVerificacion();
    $db->closeConnection();
} else {
    
}
header('Location: ../?op=alta&r=' . $resultado);
//resultado:  0 -> correo ya existe
//           -1 -> correo incorrecto o claves no iguales
//            + -> ok