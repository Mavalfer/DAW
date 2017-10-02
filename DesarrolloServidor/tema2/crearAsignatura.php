<?php
require './Request.php';
require './Asignatura.php';

/*$nombre = Request::read('nombre');
$horas = Request::read('horas');
$nombreLargo = Request::read('nombreLargo');

$asig = new Asignatura($nombre, $horas, $nombreLargo);
 */

$asig = new Asignatura();
$asig->read(); //leer la asignatura, en vez de hacer lo de arriba

echo $asig . '<br>'; 

/*
 * Montaje:
 * 1-creo la clase(apuntes)
 */