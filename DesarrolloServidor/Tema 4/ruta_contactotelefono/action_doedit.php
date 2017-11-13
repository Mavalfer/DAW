<?php
//ACTION_DOEDIT.PHP
require'../classes/AutoLoad.php';

$telefono = new Telefono();

$db = new DataBase();
$gestor = new ManageTelefono($db);
$r = $gestor->edit($telefono);
header('Location: index.php?action=editar&r=' . $r);
$db->closeConnection();