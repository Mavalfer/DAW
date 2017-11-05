<?php
require'../classes/AutoLoad.php';
$id = Request::get('id');
$db = new DataBase();
$gestor = new ManagerContacto($db);
$r = $gestor->remove($id);
header('Location: index.php?action=remove&r=' . $r);
$db->closeConnection();