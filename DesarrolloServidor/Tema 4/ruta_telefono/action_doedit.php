<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManagerTelefono($db);

$id = Request::read('id');
$idcontact = Request::read('idcontact');
$number = Request::read('number');
$description = Request::read('description');

$phone = new Telefono($id, $idcontact, $number, $description);

$r = $gestor->edit($phone);

header('Location: index.php?action=edit&r=' . $r);
$db->closeConnection();