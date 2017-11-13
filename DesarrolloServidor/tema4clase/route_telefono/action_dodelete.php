<?php
require'../classes/AutoLoad.php';
$id = Request::read('id');
$db = new DataBase();
$gestor = new ManageTelefono($db);
$r = $gestor->remove($id);
$db->closeConnection();
header('Location: index.php?action=borrar&r=' . $r);