<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManagerTelefono($db);

$id = Request::read('id');

$r = $gestor->remove($id);

header('Location: index.php?action=delete&r=' . $r);
$dataBase->closeConnection();