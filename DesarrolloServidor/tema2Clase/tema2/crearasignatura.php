<?php
require './Request.php';
require './Asignatura.php';

/*$nombre = Request::read('nombre');
$horas = Request::read('horas');
$nombrelargo = Request::read('nombrelargo');

$asig = new Asignatura($nombre, $horas, $nombrelargo);*/

$asig = new Asignatura();
$asig->read();//leer la asignatura

echo $asig;