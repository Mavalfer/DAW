<?php
//único punto de entrada a nuestra web
header('Content-Type: text/html; charset=utf-8');
require 'classes/AutoLoad.php';

echo '1º llego a index.php único punto de entrada<br>';

$ruta = Request::read("ruta");//antes rutas, ahora controlador
$accion = Request::read("accion");//antes archivos, ahora métodos

$controladorFrontal = new ControladorFrontal($ruta);

$controladorFrontal->doAction($accion);

echo $controladorFrontal->doOutput($accion);