<?php
require'../classes/AutoLoad.php';
$id = Request::post('id');
$nombre = Request::post('nombre');
$db = new DataBase();
$gestor = new ManagerContacto($db);
$contacto = new Contacto($id, $nombre);
$r = $gestor->edit($contacto);
header('Location: index.php?action=editar&r=' . $r);
$db->closeConnection();