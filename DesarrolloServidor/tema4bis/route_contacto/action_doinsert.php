<?php
require '../classes/Autoload.php';

$nombre = Request::read('nombre'); //contacto->read

$db = new DataBase();
$gestor = new ManageContacto($db);

$contacto = new Contacto(null, $nombre);

$r = $gestor.add($contacto);

//header location, con eso vuelve al index y meter el $r de insertar el contacto y el action tambien?
//close connection