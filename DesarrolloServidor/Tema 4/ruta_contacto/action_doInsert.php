<?php
require'../classes/AutoLoad.php';

$nombre = Request::get('nombre');
$contacto = new Contacto(0, $nombre);
$db = new DataBase();
$gestor = new ManagerContacto($db);
$id = $gestor->add($contacto);
header('Location: index.php?action=add&r=' . $id);//No impide que la pagina se siga ejecuntando
$db->closeConnection();