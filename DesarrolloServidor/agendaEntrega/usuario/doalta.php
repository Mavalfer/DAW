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
    
    if ($resultado > 0) {
        $enlaceActivacion = '<a href="https://daw-mavalfer.c9users.io/DesarrolloServidor/agendaEntrega/usuario/doactivar.php?id=' . $resultado . '&data=' . sha1($usuario->getCorreo()) . '"></a>';
        $resultado2 = Util::enviarCorreo ('mvalfer92@gmail.com', 'AppAgenda', $enlaceActivacion);
    }
    $db->closeConnection();
}
header('Location: ../?op=alta&r=' . $resultado);
//resultado:  0 -> correo ya existe
//           -1 -> correo incorrecto o claves no iguales
//            + -> ok