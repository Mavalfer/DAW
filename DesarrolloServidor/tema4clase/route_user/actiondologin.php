<?php
require '../classes/AutoLoad.php';
$usuario = new Usuario();
$usuario->read();
$usuariobueno = "pepe";
$clavebuena = "perez";
$sesion = new Session('sesion');
if($usuario->getUsuario() === $usuariobueno && $usuario->getClave() === $clavebuena){
    $sesion->setUser($usuario);
    header('Location: ../route_contactotelefono');
} else {
    $sesion->close();
    header('Location: ./');
}