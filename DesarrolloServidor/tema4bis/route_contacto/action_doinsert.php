<?php
require '../classes/Autoload.php';

$nombre = Request::read('nombre'); //contacto->read

$db = new DataBase();
$gestor = new ManageContacto($db);

$contacto = new Contacto(null, $nombre);

$pollas = new Contacto(null, 'paco');

$pollas->getNombre();

$asd = Request::read();

$pollas2 = new Contacto();

//header location, con eso vuelve al index y meter el $r de insertar el contacto y el action tambien?
//close connection
