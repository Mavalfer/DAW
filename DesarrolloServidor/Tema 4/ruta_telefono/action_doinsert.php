<?php
require '../classes/AutoLoad.php';
$db = new DataBase();
$gestor = new ManagerTelefono($db);

$idcontact = Request::read('id');
$number = Request::read('number');
$description = Request::read('description');
$phone = new Telefono(null, $idcontact, $number, $description);
$r = $gestor->add($phone);

//header('Location: index.php?action=insert&r=' . $r);
$db->closeConnection();