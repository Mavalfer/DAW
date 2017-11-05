<?php
require '../classes/Autoload.php';

$nombre = Request::get('nombre');
$contacto = new Contacto(0, $nombre);
$db = new DataBase();
$gestor = new ManageContacto($db);
$id = $gestor->add($contacto);
header('Location: index.php?action=add&r=' . $id);
    
$db->closeConnection();
//header location, con eso vuelve al index y meter el $r de insertar el contacto y el action tambien?
//close connection